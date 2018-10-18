<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {

        Schema::create('sport_user', function (Blueprint $table) {

            $table->integer('sport_id');

            $table->integer('user_id');

            $table->primary(['sport_id', 'user_id']);//primaryKey

            $table->integer('as_player')->default(1);

            $table->integer('as_trainer')->default(0);

            $table->integer('as_referee')->default(0);

            $table->integer('RateInSport')->default(0);

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
        Schema::dropIfExists('sport_user');
    }
}
