<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUserDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->integer('user_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('profession');
            $table->string('street');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('experience');
            $table->string('hourlyrate');
            $table->string('totalprojects');
            $table->string('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
