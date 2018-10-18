<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClubBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_branches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('c_b_user_id');
            $table->string('c_b_name')->nullable();
            $table->string('c_b_phone')->nullable();
            $table->integer('c_b_country')->nullable();
            $table->integer('c_b_city')->nullable();
            $table->integer('c_b_area')->nullable();
            $table->string('c_b_address')->nullable();
            $table->float('c_b_lat')->nullable();
            $table->float('c_b_lng')->nullable();
            $table->string('c_b_logo')->nullable();
            $table->string('c_b_banner')->nullable();
            $table->text('c_b_desc')->nullable();
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
        Schema::dropIfExists('club_branches');
    }
}
