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
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->foreignId('category_id')->constrained('income_categories')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('field_id')->constrained('field_of_incomes')->restrictOnDelete()->cascadeOnUpdate();
            $table->string('branch_name')->nullable();
            $table->longText('description');
            $table->float('amount');
            $table->string('income_by');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};
