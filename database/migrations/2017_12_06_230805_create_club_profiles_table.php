<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('c_user_id');
            $table->string('c_phone')->nullable();
            $table->integer('c_country')->nullable();
            $table->integer('c_city')->nullable();
            $table->integer('c_area')->nullable();
            $table->string('c_address')->nullable();
            $table->float('c_lat')->nullable();
            $table->float('c_lng')->nullable();
            $table->text('c_desc')->nullable();
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
        Schema::dropIfExists('club_profiles');
    }
}
