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
        Schema::create('proforma_invoices', function (Blueprint $table) {
            $table->id();
            $table->string('serial_series'); // Stores prefixes like 'INV-2026-'
            $table->integer('serial_number'); // Stores numeric markers like 1, 2, 3
            $table->string('invoice_number')->unique(); // Stores combined string 'INV-2026-0001'
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('order_id');
            $table->date('invoice_date');
            $table->decimal('basic_amount', 15, 2)->default(0.00);
            $table->decimal('gst_amount', 15, 2)->default(0.00);
            $table->decimal('invoice_amount', 15, 2)->default(0.00);
            $table->decimal('received_amount', 10, 2)->default(0.00);
            $table->decimal('balance_amount', 10, 2)->default(0.00);
            $table->enum('payment_status', ['paid', 'unpaid', 'partial','overdue'])->default('unpaid');
            $table->enum('invoice_status', ['active', 'cancelled'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proforma_invoices');
    }
};
