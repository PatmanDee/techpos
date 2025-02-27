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
        Schema::create('kitchen_printers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id');
            $table->uuid('store_id');
            $table->string('name');
            $table->string('printer_type')->default('printer'); // 'printer', 'display'
            $table->string('ip_address')->nullable();
            $table->integer('port')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            if (DB::connection()->getDriverName() === 'pgsql') {
                $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
                $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            }
        });

        Schema::create('category_kitchen_printers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('category_id');
            $table->uuid('kitchen_printer_id');
            $table->timestamps();

            $table->unique(['category_id', 'kitchen_printer_id']);

            if (DB::connection()->getDriverName() === 'pgsql') {
                $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
                $table->foreign('kitchen_printer_id')->references('id')->on('kitchen_printers')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_kitchen_printers');
        Schema::dropIfExists('kitchen_printers');
    }
};
