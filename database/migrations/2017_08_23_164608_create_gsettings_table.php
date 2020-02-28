<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGsettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gsettings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('logo')->nullable();
            $table->string('default_img')->nullable();
            $table->longText('about')->nullable();
            $table->text('footer')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->string('title')->nullable();
            $table->text('populartag')->nullable();
            $table->text('privacy')->nullable();
            $table->text('sitemap')->nullable();
            $table->text('email_body')->nullable();
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
        Schema::dropIfExists('gsettings');
    }
}
