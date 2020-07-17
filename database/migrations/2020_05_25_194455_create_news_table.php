<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable(false);
            $table->text('detail')->nullable(false);
            $table->string('briefly', 500)->nullable(true);
            $table->boolean('published')->default(false);
            $table->tinyInteger('category_id')->unsigned();
            $table->smallInteger('source_id')->unsigned();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('source_id')->references('id')->on('sources');
            //$table->index('category_id'); - На внешние ключи всегда лучше вешать индекс для улучшения сортировки.
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
