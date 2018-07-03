<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('password');
            $table->string('role')->default('ROLE_USER');
            $table->boolean('is_banned')->default(false);
            $table->integer('favorite_type_id')->unsigned()->index()->nullable();
            $table->foreign('favorite_type_id')->references('id')->on('types')->onDelete('set null');
            $table->integer('favorite_film_id')->unsigned()->index()->nullable();
            $table->foreign('favorite_film_id')->references('id')->on('films')->onDelete('set null');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
