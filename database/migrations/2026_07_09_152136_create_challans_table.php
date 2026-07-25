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
        Schema::create('challans', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('customer_id');
            $table->string('challan_number')->unique();
            $table->date('challan_date');
            $table->string('order_number')->unique();
            $table->date('order_date');
            $table->string('vehicle_number')->unique();   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challans');
    }
};
