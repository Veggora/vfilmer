<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->boolean('is_verified')->default(false);
            $table->integer('author_id')->unsigned()->index();
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('film_id')->unsigned()->index();
            $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade');
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
        Schema::dropIfExists('reviews');
    }
}
