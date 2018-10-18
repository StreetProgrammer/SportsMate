<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('giver_user_id')->nullable();
            $table->integer('rated_user_id')->nullable();
            $table->integer('rateable_id')->nullable();
            $table->integer('rateable_type')->nullable();
            $table->integer('Sport_id')->nullable();
            $table->integer('Q_1')->nullable();
            $table->integer('Q_2')->nullable();
            $table->integer('Q_3')->nullable();
            $table->integer('Q_4')->nullable();
            $table->integer('Q_5')->nullable();
            $table->integer('Q_T')->nullable();
            $table->text('comment')->nullable();
            $table->integer('integer_to_be_used')->nullable();
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
        Schema::dropIfExists('rates');
    }
}
