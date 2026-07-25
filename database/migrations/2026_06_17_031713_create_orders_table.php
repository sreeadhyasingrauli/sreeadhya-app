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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // Connects the order directly to the customer (customer table)
             $table->foreignId('customer_id')->constrained('customers', 'customer_id')->onDelete('cascade');

            // Order tracking and amounts
            $table->string('order_number')->unique();
            $table->date('order_date');
            $table->decimal('sub_total', 15, 2)->default(0.00);
            $table->decimal('gst_amount', 15, 2)->default(0.00);
            $table->decimal('total_value', 15, 2)->default(0.00);
            $table->date('valid_until');
            $table->string('payment_terms');
            $table->string('gst_terms');
            $table->string('delivery_terms');
            $table->string('pf_terms');
            $table->string('pricebasis_terms');
            $table->string('guarantee_terms');
            $table->string('ld_terms');
            $table->string('other_terms');
            $table->string('order_status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
