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
        Schema::create('sms_reports', function (Blueprint $table) {
             $table->id();
            $table->string('mobile');
            $table->text('message_body');
            $table->integer('status_code')->nullable();  // e.g. 200, 400
            $table->text('api_response')->nullable();
            $table->boolean('success')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sms_reports');
    }
};
