<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->boolean('booked_on')->default(0);
            $table->boolean('admin')->default(0);
            $table->string('coming_from');
            $table->integer('can_host')->nullable();
            $table->longText('hosting_details')->nullable();
            $table->string('email')->unique();
            $table->boolean('needs_accom')->default(0);
            $table->boolean('needs_parking')->default(0);
            $table->boolean('spoons_interest')->default(0);
            $table->boolean('tour_interest')->default(0);
            $table->boolean('escape_room_interest')->default(0);
            $table->timestamp('email_verified_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
