<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('C_creator_id');
            $table->integer('C_candidate_id')->nullable();
            $table->integer('C_creator_team')->nullable();
            $table->integer('C_candidate_team')->nullable();
            $table->integer('C_YesOrNo')->nullable();
            $table->integer('C_sport_id');
            $table->integer('C_playground_id')->nullable();
            $table->integer('C_reservation')->nullable();
            $table->integer('C_payment_type')->nullable();
            $table->integer('C_payment')->nullable();
            $table->timestamp('C_date')->nullable();
            $table->integer('C_day')->nullable();
            $table->integer('C_from')->nullable();
            $table->integer('C_to')->nullable();
            $table->timestamp('C_JQueryFrom')->nullable();
            $table->timestamp('C_JQueryTo')->nullable();
            $table->json('C_result')->nullable();
            $table->integer('C_winer_id')->nullable();
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
        Schema::dropIfExists('challenges');
    }
}
