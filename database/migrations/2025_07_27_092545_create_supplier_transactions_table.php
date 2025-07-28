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
        Schema::create('supplier_transactions', function (Blueprint $table) {
            $table->id();
            $table->date('transaction_date');
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade');
            $table->enum('transaction_type', ['Payment', 'PurchaseDue', 'Adjustment'])->default('Payment');
            $table->enum('payment_method', ['Cash', 'Cheque', 'Bkash', 'T.T', 'Bank TT'])->nullable();
            $table->string('reference_no')->nullable();  // Optional reference/voucher
            $table->decimal('previous_balance', 15, 2)->default(0);
            $table->decimal('paid_amount', 15, 2)->default(0);
            $table->decimal('running_balance', 15, 2)->default(0);
            $table->foreignId('paid_by')->nullable()->constrained('users')->nullOnDelete();
            $table->text('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_transactions');
    }
};
