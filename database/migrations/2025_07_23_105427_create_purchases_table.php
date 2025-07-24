<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();

            // Foreign key to supplier
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade');

            // Purchase metadata
            $table->date('purchase_date')->nullable();
            $table->string('voucher_number')->unique()->nullable();

            // Financial fields
            $table->decimal('total', 10, 2)->default(0); // Before discount & transport
            $table->decimal('total_discount', 10, 2)->default(0);
            $table->decimal('transport_cost', 10, 2)->default(0);
            $table->decimal('grand_total', 10, 2)->default(0); // total - discount + transport

            $table->decimal('previous_balance', 10, 2)->default(0);
            $table->decimal('paid_amount', 10, 2)->default(0);
            $table->decimal('current_balance', 10, 2)->default(0); // grand_total + prev_balance - paid

            // Payment details
            $table->enum('payment_status', ['Paid', 'Partial', 'Due'])->default('Due');
            $table->enum('payment_type', ['Cash', 'Bank', 'Mobile'])->default('Cash');

            // Misc
            $table->enum('status', ['Pending', 'Confirmed', 'Cancelled'])->default('Confirmed');
            $table->text('note')->nullable();

            // Created by user (admin)
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
