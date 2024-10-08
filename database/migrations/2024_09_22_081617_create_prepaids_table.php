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

        Schema::create('prepaids', function (Blueprint $table) {
            $table->id();
            $table->string('product_code');
            $table->string('product_description');
            $table->string('product_nominal');
            $table->text('product_details');
            $table->bigInteger('product_price');
            $table->string('product_type');
            $table->string('active_period');
            $table->string('status');
            $table->string('icon_url');
            $table->string('product_category');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prepaids');
    }
};
