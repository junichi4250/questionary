<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatereviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_id');
            $table->string('name');
            $table->tinyInteger('gender');
            $table->unsignedBigInteger('age_id');
            $table->string('email');
            $table->tinyInteger('is_send_email');
            $table->integer('score');
            $table->string('feedback')->nullable();
            $table->string('photo_url')->nullable();
            $table->timestamps();

            $table->foreign('shop_id')->references('shop_id')->on('shops');
            $table->foreign('age_id')->references('age_id')->on('ages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
