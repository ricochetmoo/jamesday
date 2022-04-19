<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlusOnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plus_ones', function (Blueprint $table) {
            $table->id();
            $table->integer('requester_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('status')->default('requested');
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
        Schema::dropIfExists('plus_ones');
    }
}
