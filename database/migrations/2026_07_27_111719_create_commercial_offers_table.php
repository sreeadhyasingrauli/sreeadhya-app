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
        Schema::create('commercial_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id');
            $table->string('offer_number');
            $table->date('offer_date');
            $table->string('enquiry_number');
            $table->date('enquiry_date');
            $table->string('validity');
            $table->string('payment_terms');
            $table->string('gst_terms');
            $table->string('delivery_terms');
            $table->string('discount');
            $table->string('pricebasis_terms');
            $table->string('guarantee_terms');
            $table->string('other_terms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commercial_offers');
    }
};
