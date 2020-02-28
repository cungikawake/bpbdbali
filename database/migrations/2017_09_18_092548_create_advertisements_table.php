<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
        Schema::create('advertisements', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('advert_type')->nullable();
            $table->tinyInteger('advert_size')->nullable();
            $table->string('title');
            $table->string('val1')->nullable();
            $table->text('val2')->nullable();
            $table->text('link')->nullable();
            $table->integer('hit')->default(0);
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('advertisements');
    }
}
