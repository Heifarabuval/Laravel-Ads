<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('id_room')->unsigned();
            $table->foreign('id_room')
                ->references('id')->on('chat-rooms')
                ->onDelete('cascade');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->mediumText('message');
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
        //
    }
}
