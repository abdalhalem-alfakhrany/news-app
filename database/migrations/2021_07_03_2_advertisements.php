<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class Advertisements extends Migration
{

    public function up()
    {
        Schema::create('video_advertisements', function (Blueprint $table) {
            $table->id();

            $table->string('video')->nullable();
            $table->string('name');

            $table->timestamps();
        });

        Schema::create('image_advertisements', function (Blueprint $table) {
            $table->id();

            $table->string('image');
            $table->string('name');

            $table->timestamps();
        });

        Schema::create('home_page_advertisements', function (Blueprint $table) {
            $table->id();

            $table->foreignId('image_advertisement_id')->constrained()->onDelete('cascade');
            $table->unique(['image_advertisement_id']);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('video_advertisements');
        Schema::dropIfExists('image_advertisements');
        Schema::dropIfExists('home_page_advertisements');
    }
}
