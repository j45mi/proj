<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Schema::table('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('players_count');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('users')->onDelete('cascade');
        }); */

        Schema::table('users', function(Blueprint $table) {
            $table->integer('current_team_id')->unsigned()->nullable();
        });

        Schema::create('teams', function(Blueprint $table) {
            $table->id();
            $table->integer('owner_id')->unsigned();

            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description');
            $table->text('team_information');

            $table->timestamps();
        });

        Schema::create('team_user', function(Blueprint $table) {
            //$table->integer('user_id')->unsigned();
            //$table->integer('team_id')->unsigned();
            
            $table->foreignId('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade')->unsigned();
            $table->foreignId('team_id')->references('id')->on('teams')->onDelete('cascade')->unsigned();
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
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('current_team_id');
        });

        Schema::table('team_user', function(Blueprint $table) {
            $table->dropForeign('team_user_user_id_foreign');
            $table->dropForeign('team_user_team_id_foreign');
        });

        Schema::drop('team_user');
        Schema::drop('teams');
    }
};
