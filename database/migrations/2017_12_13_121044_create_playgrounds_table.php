<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaygroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playgrounds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('c_user_id');//=>user main profile id to make relation(belong to which club)
            $table->integer('c_branch_id');//=>branch table record id to make relation(belong to which branch)
            $table->string('c_b_p_name');
            $table->string('c_b_p_phone')->nullable();
            $table->text('c_b_p_desc')->nullable();
            $table->string('c_b_p_logo')->nullable();
            $table->integer('c_b_p_sport_id');//=>sport table record id to make relation(what kind of sport palying )
            $table->string('c_b_p_price_per_hour')->nullable();
            $table->integer('c_b_p_country')->nullable();
            $table->integer('c_b_p_city')->nullable();
            $table->integer('c_b_p_area')->nullable();
            $table->string('c_b_p_address')->nullable();
            $table->float('c_b_p_lat')->nullable();
            $table->float('c_b_p_lng')->nullable();
            $table->string('slug')->nullable();
            $table->integer('rating')->nullable();
            $table->integer('is_active')->nullable();
            $table->integer('our_is_active')->nullable();
            $table->string('active_code')->nullable();
            $table->boolean('feature1')->default(0);
            $table->boolean('feature2')->default(0);
            $table->boolean('feature3')->default(0);
            $table->boolean('feature4')->default(0);
            $table->boolean('feature5')->default(0);
            $table->boolean('feature6')->default(0);
            $table->boolean('feature7')->default(0);
            $table->boolean('feature8')->default(0);
            $table->boolean('feature9')->default(0);
            $table->boolean('feature10')->default(0);
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
        Schema::dropIfExists('playgrounds');
    }
}
