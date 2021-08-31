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
            $table->string('user_nickname')->nullable();;
            $table->string('user_avatar')->nullable();;
            $table->string('user_sex')->nullable();;
            $table->date('user_birthday')->nullable();;
            $table->string('user_job')->nullable();;
            $table->string('user_city')->nullable();;
            $table->string('user_main_page')->nullable();;
            $table->string('user_github')->nullable();;
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
