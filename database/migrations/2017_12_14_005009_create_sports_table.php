<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sports', function (Blueprint $table) {
            $table->increments('id');

            $table->string('ar_sport_name')->nullable();

            $table->string('en_sport_name')->nullable();

            $table->text('sport_desc')->nullable();
            
            $table->integer('sport_player_num')->nullable();
            
            $table->string('sport_img')->nullable();
            
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
        Schema::dropIfExists('sports');
        Schema::dropIfExists('sport_user');
    }
}
