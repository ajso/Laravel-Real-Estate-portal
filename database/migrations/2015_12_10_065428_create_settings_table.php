<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');                 
            $table->string('site_style');
            $table->string('site_name');
            $table->string('site_email');
            $table->string('site_logo');
            $table->string('site_favicon');
            $table->string('site_description');
            $table->text('site_header_code');
            $table->text('site_footer_code');
            $table->string('site_copyright');
            $table->text('footer_widget1');
            $table->text('footer_widget2');
            $table->text('footer_widget3');
            $table->text('addthis_share_code');
            $table->text('disqus_comment_code'); 
             
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings');
    }
}
