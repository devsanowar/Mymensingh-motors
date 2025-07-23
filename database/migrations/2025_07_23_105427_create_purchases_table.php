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

            // Supplier
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade');

            // Basic Info
            $table->date('purchase_date')->nullable();
            $table->string('invoice_number')->nullable(); //->unique(); // uncomment if needed
            $table->string('reference_no')->nullable();

            // Financial Info
            $table->decimal('subtotal', 15, 2)->default(0);
            $table->decimal('discount_amount', 15, 2)->default(0);
            $table->decimal('tax_amount', 15, 2)->default(0);
            $table->decimal('shipping_charge', 15, 2)->default(0)->nullable();

            $table->decimal('total_amount', 15, 2)->default(0);
            $table->decimal('paid_amount', 15, 2)->default(0);
            $table->decimal('due_amount', 15, 2)->default(0);

            // Status
            $table->enum('payment_status', ['Paid', 'Partial', 'Due'])->default('Due');
            $table->enum('purchase_status', ['Received', 'Pending', 'Ordered', 'Cancelled'])->default('Received');

            // Extra
            $table->string('payment_method')->nullable();
            $table->text('notes')->nullable();
            $table->text('document')->nullable();

            // Created by
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
