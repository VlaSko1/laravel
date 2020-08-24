<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('link', 255);
            $table->string('slug', 255)->nullable();
            $table->bigInteger('category_parsing_id')->unsigned();
            $table->smallInteger('source_id')->unsigned();
            $table->timestamps();
            $table->foreign('source_id')->references('id')->on('sources');
            $table->index('source_id');
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
        Schema::dropIfExists('resources');
    }
}
