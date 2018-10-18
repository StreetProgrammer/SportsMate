<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventPlaygroundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_playground', function (Blueprint $table) {
        
            $table->integer('event_id');

            $table->integer('playground_id');

            $table->primary(['event_id', 'playground_id']);//primaryKey

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
        Schema::dropIfExists('event_playground');
    }
}
