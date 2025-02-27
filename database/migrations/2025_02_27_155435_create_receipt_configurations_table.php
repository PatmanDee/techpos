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
        Schema::create('receipt_configurations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('tenant_id');
            $table->uuid('store_id')->nullable();
            $table->text('header')->nullable();
            $table->text('footer')->nullable();
            $table->boolean('show_logo')->default(true);
            $table->string('logo_path')->nullable();
            $table->string('paper_size')->default('standard'); // 'standard', 'narrow'
            $table->boolean('show_tax_summary')->default(true);
            $table->boolean('show_cashier_name')->default(true);
            $table->boolean('show_customer_info')->default(false);
            $table->text('custom_text')->nullable();
            $table->timestamps();

            if (DB::connection()->getDriverName() === 'pgsql') {
                $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade');
                $table->foreign('store_id')->references('id')->on('stores')->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipt_configurations');
    }
};
