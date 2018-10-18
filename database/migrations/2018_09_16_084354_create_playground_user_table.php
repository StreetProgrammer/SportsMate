<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaygroundUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playground_user', function (Blueprint $table) {
    
            $table->integer('playground_id');

            $table->integer('user_id');

            $table->primary(['playground_id', 'user_id']);//primaryKey

            $table->integer('active')->default(1);

            $table->integer('reservations')->default(0);

            $table->integer('tobeuse')->default(0);

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
        Schema::dropIfExists('playground_user');
    }
}
