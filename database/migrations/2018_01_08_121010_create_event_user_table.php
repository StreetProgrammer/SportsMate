<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_user', function (Blueprint $table) {

            $table->integer('event_id');

            $table->integer('user_id');

            $table->primary(['event_id', 'user_id']);//primaryKey

            $table->integer('as_player')->default(1);

            $table->integer('as_trainer')->default(0);

            $table->integer('as_referee')->default(0);

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
        Schema::dropIfExists('event_user');
    }
}
