<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChatRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat-rooms',function (Blueprint $table){
            $table->increments('id');
            $table->integer('id_user1')->unsigned();
            $table->foreign('id_user1')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->integer('id_user2')->unsigned();
            $table->foreign('id_user2')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->integer('ad_id')->unsigned();
            $table->foreign('ad_id')
                ->references('id')->on('ads')
                ->onDelete('cascade');
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
