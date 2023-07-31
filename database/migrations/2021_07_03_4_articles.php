<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Articles extends Migration
{

    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            $table->foreignId('category_id')
                ->constrained()->onDelete('cascade');

            $table->foreignId('publisher')
                ->constrained('users')->onDelete('cascade');

            $table->foreignId('video_advertisement_id')
                ->nullable()->constrained('video_advertisements')->onDelete('cascade');

            $table->string('image')->nullable();
            $table->string('video_url')->nullable();

            $table->foreignId('top_advertisement')
                ->nullable()->constrained('image_advertisements')->onDelete('cascade');
            $table->foreignId('middle_advertisement')
                ->nullable()->constrained('image_advertisements')->onDelete('cascade');
            $table->foreignId('bottom_advertisement')
                ->nullable()->constrained('image_advertisements')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('article_translations', function (Blueprint $table) {
            $table->foreignId('article_id')->constrained()->onDelete('cascade');
            $table->char('locale', 10);

            $table->string('title');
            $table->text('section1');
            $table->text('section2')->nullable();
            $table->text('section3')->nullable();

            $table->unique(['locale', 'article_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
        Schema::dropIfExists('article_translations');
    }
}
