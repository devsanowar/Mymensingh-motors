<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('product_stocks', function (Blueprint $table) {
            $table->enum('stock_type', ['in', 'out'])->default('in');
            $table->enum('reference_type', ['purchase', 'sale', 'adjustment'])->default('purchase');
            $table->unsignedBigInteger('reference_id')->nullable(); // purchase_id, sale_id, etc.
            $table->date('date')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_stocks', function (Blueprint $table) {
            //
        });
    }
};
