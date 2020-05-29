<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NewsHasCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_has_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category1s_id');
            $table->unsignedBigInteger('news1s_id');

            $table->foreign('category1s_id')->references('id')
                ->on('category1s');
            $table->foreign('news1s_id')->references('id')
                ->on('news1s');

            $table->index(['category1s_id', 'news1s_id']);
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
