<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Categories extends Migration
{

    public function up()
    {
        Schema::create(config('tabels.categoriesTable'), function (Blueprint $table) {
            $table->id();

            $table->string('image')->nullable();

            $table->timestamps();
        });

        Schema::create(config('tabels.categoryTranslationTable'), function (Blueprint $table) {
            $table->id();

            $table->char('locale', 10);
            $table->foreignId('category_id')->constrained()->onDelete('cascade');

            $table->string('title');

            $table->unique(['locale', 'category_id']);
        });

        Schema::create(config('tabels.categoryAdvertisementsTable'), function (Blueprint $table) {
            $table->foreignId('category_id')->constrained()->onDelete('cascade');;
            $table->foreignId('image_advertisement_id')->constrained()->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists(config('tabels.categoriesTable'));
        Schema::dropIfExists(config('tabels.categoryTranslationTable'));
        Schema::dropIfExists(config('tabels.categoryAdvertisementsTable'));
    }
}
