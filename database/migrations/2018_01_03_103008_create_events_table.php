<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('E_creator_id');
            $table->integer('E_candidate_id')->nullable();
            $table->integer('E_creator_team')->nullable();
            $table->integer('E_candidate_team')->nullable();
            $table->integer('E_preferred_rate')->nullable();
            $table->integer('E_sport_id');
            $table->integer('E_playground_id')->nullable();
            $table->integer('E_reservation')->nullable();
            $table->integer('E_payment_type')->nullable();
            $table->integer('E_payment')->nullable();
            $table->date('E_date')->nullable();
            $table->integer('E_day')->nullable();
            $table->integer('E_from')->nullable();
            $table->integer('E_to')->nullable();
            $table->timestamp('E_JQueryFrom')->nullable();
            $table->timestamp('E_JQueryTo')->nullable();
            $table->json('E_result')->nullable();
            $table->integer('E_winer_id')->nullable();
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
        Schema::dropIfExists('events');
    }
}
