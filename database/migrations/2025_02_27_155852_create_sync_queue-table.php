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
        Schema::create('sync_queue', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id');
            $table->uuid('store_id');
            $table->uuid('device_id')->nullable();
            $table->uuid('user_id')->nullable();
            $table->string('entity_type'); // 'order', 'product', etc.
            $table->uuid('entity_id');
            $table->string('action'); // 'create', 'update', 'delete'

            // For SQLite, we use TEXT for JSON storage
            if (DB::connection()->getDriverName() === 'sqlite') {
                $table->text('data');
            } else {
                $table->json('data');
            }

            $table->string('status')->default('pending');
            $table->integer('attempts')->default(0);
            $table->timestamp('synced_at')->nullable();
            $table->timestamps();

            if (DB::connection()->getDriverName() === 'pgsql') {
                $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
                $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
                $table->foreign('device_id')->references('id')->on('pos_devices')->onDelete('set null');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sync_queue');
    }
};
