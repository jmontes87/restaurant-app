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
        Schema::create('food_has_ingredient', function (Blueprint $table) {
            $table->bigInteger('food_id')->unsigned();
            $table->foreign('food_id')->references('id')->on('food')->onDelete('cascade');
            $table->bigInteger('ingredient_id')->unsigned();
            $table->foreign('ingredient_id')->references('id')->on('ingredient')->onDelete('cascade');
            $table->timestamps();
        });
    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_has_ingredient');
    }
};
