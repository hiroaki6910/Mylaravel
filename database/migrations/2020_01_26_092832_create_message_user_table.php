<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('message_id'); 
            $table->unsignedBigInteger('sender_user_id');
            $table->unsignedBigInteger('recipient_user_id');
            $table->unique(['sender_user_id', 'recipient_user_id']);
            $table->timestamps();
            
            $table->foreign('message_id')
                ->references('id')
                ->on('messages')
                ->onDelete('cascade');
            
            $table->foreign('sender_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
                
            $table->foreign('recipient_user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_user');
    }
}
