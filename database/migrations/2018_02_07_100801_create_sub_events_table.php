<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('sub_events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mainEvent_id')->nullable(); // id for the event contain that SubEvent
            $table->string('mainEvent_type')->nullable(); // type for the event contain that SubEvent
            $table->integer('S_E_creator_id')->nullable();
            $table->integer('S_E_candidate_id')->nullable();
            $table->integer('S_E_creator_team')->nullable();
            $table->integer('S_E_candidate_team')->nullable();
            //$table->integer('S_E_preferred_rate')->nullable();
            $table->integer('S_E_sport_id');
            $table->integer('S_E_playground_id')->nullable();
            $table->integer('S_E_reservation')->nullable();
            $table->integer('S_E_R_CreatorScoreator')->nullable();
            $table->integer('S_E_R_CandidateScoreator')->nullable();
            $table->timestamp('S_E_date')->nullable();
            $table->integer('S_E_day')->nullable();
            $table->integer('S_E_from')->nullable();
            $table->integer('S_E_to')->nullable();
            $table->timestamp('S_E_JQueryFrom')->nullable();
            $table->timestamp('S_E_JQueryTo')->nullable();
            $table->json('S_E_result')->nullable();
            $table->integer('S_E_winer_id')->nullable();
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
        Schema::dropIfExists('sub_events');
    }
}
