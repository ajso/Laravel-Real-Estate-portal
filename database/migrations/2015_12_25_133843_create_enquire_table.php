<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnquireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enquire', function (Blueprint $table) {
            $table->increments('id');                 
            $table->integer('property_id')->length(11);
            $table->integer('agent_id')->length(11);
            $table->string('name');
            $table->string('email');
            $table->string('phone');             
            $table->text('message'); 
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('enquire');
    }
}
