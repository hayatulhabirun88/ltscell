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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('ref_id')->nullable();
            $table->bigInteger('tr_id')->nullable();
            $table->string('name')->nullable();
            $table->bigInteger('meter_no')->nullable();
            $table->bigInteger('subscriber_id')->nullable();
            $table->string('segment_power')->nullable();
            $table->integer('status')->nullable();
            $table->string('product_code')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('price')->nullable();
            $table->string('message')->nullable();
            $table->bigInteger('balance')->nullable();
            $table->bigInteger('rc')->nullable();
            $table->string('sn')->nullable();
            $table->timestamps();
            $table->bigInteger('prepaid_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
