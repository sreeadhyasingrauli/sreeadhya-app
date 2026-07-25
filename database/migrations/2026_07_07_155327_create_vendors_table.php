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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id('vendor_id');
            $table->string('vendor_name');
             $table->string('country');
             $table->string('state');
             $table->string('city');
             $table->string('pin_code');
            $table->string('address_line1');
            $table->string('address_line2')->nullable();
            $table->string('gst_number')->nullable();
             $table->string('status')->default('pending'); // pending, approved
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
