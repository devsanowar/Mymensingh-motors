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
        Schema::create('upazilas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('district_id')->constrained('districts')->onDelete('cascade');
            $table->string('upazila_name');
            $table->tinyInteger('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upazilas');
    }
};
