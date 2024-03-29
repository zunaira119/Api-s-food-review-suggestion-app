<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodCategoryRestaurantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_category_restaurant', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('food_category_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('food_category_id')->references('id')->on('food_categories')->onDelete('cascade');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_category_restaurant');
    }
}
