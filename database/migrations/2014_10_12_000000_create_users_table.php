<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();
            $table->enum('role', ['user', 'admin']);
            $table->smallInteger('team_slot_1')->unsigned();
            $table->smallInteger('team_slot_2')->unsigned();
            $table->smallInteger('team_slot_3')->unsigned();
            $table->smallInteger('team_slot_4')->unsigned();
            $table->smallInteger('team_slot_5')->unsigned();
            $table->smallInteger('team_slot_6')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
