<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignUsersToDirections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users',function (Blueprint $table){
<<<<<<< HEAD
            $table->foreign('direction')->references('id')->on('directions');
=======
            $table->foreign('direction')->references('id')->on('directions')->onDelete('cascade');
>>>>>>> github/Bartek
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
