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

        Schema::create('escala_user', function (Blueprint $table) {
            $table->unsignedBigInteger('escala_id');
            $table->unsignedBigInteger('user_id');

            $table->timestamps();

            $table->foreign('escala_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('escala')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escala_user');
    }
};
