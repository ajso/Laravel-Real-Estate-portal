<?php

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
            $table->string('usertype', 20)->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('phone')->nullable();
			$table->string('fax')->nullable();
			$table->text('about')->nullable();
			$table->string('facebook')->nullable();
			$table->string('twitter')->nullable();
			$table->string('gplus')->nullable();
			$table->string('linkedin')->nullable();			
			$table->string('image_icon')->nullable();
			$table->integer('status')->length(1)->default(1);
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
        Schema::drop('users');
    }
}
