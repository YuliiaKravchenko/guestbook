<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
     public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('url');
            $table->string('img');
            $table->text('msg');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::drop('messages');
    }
}
