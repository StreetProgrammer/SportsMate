<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengePlaygroundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('challenge_playground', function (Blueprint $table) {
        
            $table->integer('challenge_id');

            $table->integer('playground_id');

            $table->primary(['challenge_id', 'playground_id']);//primaryKey

            $table->integer('chosenBy');

            $table->integer('responsedBy')->default(0);

            $table->integer('yesOrno')->default(0);

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
        Schema::dropIfExists('challenge_playground');
    }
}
