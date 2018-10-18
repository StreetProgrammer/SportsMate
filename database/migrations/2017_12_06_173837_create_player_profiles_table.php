<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('p_user_id');
            $table->string('p_phone')->nullable();
            $table->integer('p_country')->nullable();
            $table->integer('p_city')->nullable();
            $table->integer('p_area')->nullable();
            $table->string('p_address')->nullable();
            $table->float('p_lat')->nullable();
            $table->float('p_lng')->nullable();
            $table->integer('p_gender')->nullable();
            $table->integer('p_preferred_gender')->nullable();
            $table->date('p_born_date')->nullable();
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
        Schema::dropIfExists('player_profiles');
    }
}
