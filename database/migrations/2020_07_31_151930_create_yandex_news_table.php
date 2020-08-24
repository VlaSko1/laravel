<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYandexNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yandex_news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('link', 255);
            $table->text('description');
            $table->string('pubDate', 100);
            $table->bigInteger('category_parsing_id')->unsigned();
            $table->boolean('published')->default(false);
            $table->timestamps();
            $table->foreign('category_parsing_id')->references('id')->on('categoryes_parsing');
            $table->index('category_parsing_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yandex_news');
    }
}
