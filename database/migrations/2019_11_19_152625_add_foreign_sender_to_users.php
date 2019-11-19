<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignSenderToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    Public function up()
    {
        Schema::table('messages',function (Blueprint $table){
            $table->foreign('sender')->references('id')->on('users')->onDelete('cascade');
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
