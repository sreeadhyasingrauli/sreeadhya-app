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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            // Foreign keys referencing parent entities
             $table->foreignId('order_id');
            $table->foreignId('product_id');
            $table->string('part_number');
            $table->string('part_description');
            $table->unsignedInteger('hsn_code') ->nullable(); // HSN code can be null if not applicable
            $table->string('uom')->nullable(); // e.g., pcs, kg, etc.
        
            $table->integer('order_quantity')->default(1);
            $table->decimal('unit_price', 15, 2); // Single item price
            $table->decimal('gst_rate', 5, 2)->default(0.00); // GST rate in percentage
            $table->decimal('gst_amount', 15, 2)->default(0.00); // GST amount
            $table->decimal('sub_total', 15, 2); // quantity * price
             $table->decimal('parts_total', 15, 2)->default(0.00); // quantity * price
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
