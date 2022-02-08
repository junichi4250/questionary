<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->integer('shop_id');
            $table->string('name');
            $table->tinyInteger('gender');
            $table->integer('age_id');
            $table->string('email');
            $table->tinyInteger('is_send_email');
            $table->string('feedback');
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
        Schema::dropIfExists('answers');
    }
}
