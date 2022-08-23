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
        Schema::create('pairs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('id_currency_from')->unsigned()->nullable();
            $table->foreign('id_currency_from')->references('id')->on('currencies');
            $table->integer('id_currency_to')->unsigned()->nullable();
            $table->foreign('id_currency_to')->references('id')->on('currencies');
            $table->decimal('rate', 12, 6);
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
        Schema::dropIfExists('pairs');
    }
};
