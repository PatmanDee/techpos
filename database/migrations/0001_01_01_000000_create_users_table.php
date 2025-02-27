<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->uuid('tenant_id')->nullable()->after('id');
            $table->string('phone')->nullable()->after('email');
            $table->string('role')->default('cashier')->after('phone');
            $table->string('pin_code')->nullable()->after('password');
            $table->string('auth_pin')->nullable()->after('pin_code'); // For authorizing sensitive operations
            $table->string('status')->default('active')->after('auth_pin');

            // For SQLite, we use TEXT for JSON storage
            if (DB::connection()->getDriverName() === 'sqlite') {
                $table->text('settings')->nullable()->after('status');
            } else {
                $table->json('settings')->nullable()->after('status');
            }

            // Add foreign key only for PostgreSQL
            if (DB::connection()->getDriverName() === 'pgsql') {
                $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (DB::connection()->getDriverName() === 'pgsql') {
                $table->dropForeign(['tenant_id']);
            }

            $table->dropColumn([
                'tenant_id',
                'phone',
                'role',
                'pin_code',
                'auth_pin',
                'status',
                'settings'
            ]);
        });
    }
};
