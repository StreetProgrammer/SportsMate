<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('PR_PlayerId');
            $table->integer('PR_OpinionBy');
            $table->integer('PR_EventId');
            $table->integer('PR_SportId');
            $table->unsignedTinyInteger('PR_Rate_1');
            $table->unsignedTinyInteger('PR_Rate_2');
            $table->unsignedTinyInteger('PR_Rate_3');
            $table->unsignedTinyInteger('PR_Rate_4');
            $table->unsignedTinyInteger('PR_Rate_5');
            $table->unsignedTinyInteger('PR_Rate');
            $table->text('PR_Desc');
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
        Schema::dropIfExists('player_rates');
    }
}
