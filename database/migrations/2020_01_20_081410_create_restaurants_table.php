<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');
            $table->string('city');
            $table->integer('Post_code');
            $table->string('phone')->unique();
            $table->string('image')->nullable();
            $table->string('cover_photo')->nullable();
            $table->float('lng',10,2);
            $table->float('lat',10,2);
            $table->time('opening_time');
            $table->time('closing_time');
            $table->integer('rating')->nullable();
            $table->boolean('featured')->default(false)->nullable();
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
        Schema::dropIfExists('restaurants');
    }
}
