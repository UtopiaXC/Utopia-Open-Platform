<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_profile', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('user_id');
            $table->string('user_nickname');
            $table->string('user_avatar');
            $table->string('user_sex');
            $table->date('user_birthday');
            $table->string('user_job');
            $table->string('user_city');
            $table->string('user_main_page');
            $table->string('user_github');
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
        Schema::dropIfExists('users_profile');
    }
}
