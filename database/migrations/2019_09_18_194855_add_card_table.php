<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('liblary');
            $table->string('dormitory');
             $table->string('deanery');
             $table->string('promoter');
             $table->integer('commission_id')->unsigned();
             $table->integer('userPromoter');
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
        Schema::dropIfExists('card');
    }
}
