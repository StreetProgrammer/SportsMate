<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendingEditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_edits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('taraget_model_type');
            $table->integer('taraget_model_id');
            $table->integer('user_id');
            $table->longText('display');
            $table->longText('old_data');
            $table->longText('new_data');
            $table->enum('status', ['pending', 'approved', 'rejected'])->defult('pending');
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
        Schema::dropIfExists('pending_edits');
    }
}
