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
        Schema::create('mobile_products', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name');
            $table->string('mobile_model');
            $table->string('mobile_image');
            $table->string('price');
            $table->string('qunatity');
            $table->string('description');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobile_products');
    }
};
