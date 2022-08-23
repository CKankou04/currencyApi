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
        Schema::create('converts', function (Blueprint $table) {
            $table->integer('id_pairs')->unsigned()->nullable();
            $table->foreign('id_pairs')->references('id')->on('pairs');
            $table->integer('nb_count'); 
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
        Schema::dropIfExists('converts');
    }
};
