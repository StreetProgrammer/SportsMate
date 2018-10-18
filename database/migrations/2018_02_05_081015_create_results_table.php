<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('E_R_OpinionBy')->nullable();
            $table->integer('E_R_ConfirmBy')->nullable();
            $table->integer('E_R_EventId')->nullable();
            $table->integer('Sport_id')->nullable();
            $table->integer('E_R_CreatorScore')->nullable();
            $table->integer('E_R_CandidateScore')->nullable();
            $table->integer('E_R_IsFinalResult')->nullable();
            $table->integer('E_R_WinerId')->nullable();
            $table->integer('E_R_event_type')->nullable();
            $table->integer('E_R_YesOrNo')->nullable();
            $table->string('string_to_be_used')->nullable();
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
        Schema::dropIfExists('results');
    }
}
