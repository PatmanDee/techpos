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
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id')->nullable();
            $table->uuid('user_id')->nullable();
            $table->uuid('store_id')->nullable();
            $table->string('action'); // 'login', 'sale', 'refund', 'inventory_adjustment', etc.
            $table->string('entity_type')->nullable(); // 'product', 'order', 'customer', etc.
            $table->uuid('entity_id')->nullable();
            $table->text('description')->nullable();
            $table->string('ip_address')->nullable();

            // For SQLite, we use TEXT for JSON storage
            if (DB::connection()->getDriverName() === 'sqlite') {
                $table->text('metadata')->nullable();
            } else {
                $table->json('metadata')->nullable();
            }

            $table->timestamps();

            if (DB::connection()->getDriverName() === 'pgsql') {
                $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('set null');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
                $table->foreign('store_id')->references('id')->on('stores')->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
