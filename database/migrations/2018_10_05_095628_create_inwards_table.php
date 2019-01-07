<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inwards', function (Blueprint $table) {
            $table->increments('id');
            $table->BigInteger('letter_id')->unsigned()->nullable();
            $table->String('date');
            $table->String('comment');
            $table->String('to_office')->default('-');
            $table->integer('worksheet_id')->unsigned();
            $table->foreign('worksheet_id')->references('id')->on('worksheets');
            $table->foreign('letter_id')->references('letter_id')->on('letters');
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
        Schema::dropIfExists('inwards');
    }
}
