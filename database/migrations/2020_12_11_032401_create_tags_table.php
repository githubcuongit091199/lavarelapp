<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();//mặc định
            $table->integer('categories_id');
            $table->string('tag');//them thuoc tinh nay
            $table->string('price');
            $table->text('description');
            $table->integer('quatity')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();//mặc định

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
