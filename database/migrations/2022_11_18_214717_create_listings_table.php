<?php
// TODO:
// after editing this file running migration is needed: php artisan migrate:refresh --seed

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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); //to happen something in database we need to run migration!!!
            $table->string('title');
            $table->string('logo')->nullable();
            $table->string('sport')->nullable();
            $table->string('location');
            $table->string('email');
            $table->string('website');
            $table->longtext('conditions');
            $table->integer('max_players');
            $table->string('prize')->nullable();
            $table->string('winner')->nullable();
            $table->date('date')->nullable();
            $table->boolean('approved');
            $table->longText('descriptions');
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
        Schema::dropIfExists('listings');
    }
};
