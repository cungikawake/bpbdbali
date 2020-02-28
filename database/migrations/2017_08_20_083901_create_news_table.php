<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('news');
        
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('schedule')->default(0);
            $table->string('title', 100);
            $table->string('slug')->nullable();
            $table->integer('category_id',100)->nullable();
            $table->string('image')->nullable();
            $table->text('details')->nullable();
            $table->text('source')->nullable();    
            $table->boolean('breaking')->default(0);
            $table->boolean('featured')->default(0);
            $table->boolean('slider')->default(0);
            $table->boolean('status')->default(0);
            $table->string('user_name',100)->nullable();
            $table->tinyInteger('hit_count')->default(0);
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
        Schema::dropIfExists('news');
    }
}
