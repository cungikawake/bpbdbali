<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlider extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popup_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->string('status')->nullable();
            $table->date('start')->nullable();
            $table->date('finish')->nullable();
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
        //
    }
}
