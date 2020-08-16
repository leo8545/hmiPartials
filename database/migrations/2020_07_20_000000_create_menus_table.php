<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('info')->nullable();
            $table->boolean('published');
            $table->timestamps();
        });

        Schema::create('menu_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->foreign('menu_id')->references('id')->on('menus');
            $table->string('section');
            $table->string('info')->nullable();
            $table->timestamps();
        });

        Schema::create('menu_items', function (Blueprint $table) {
            $table->id();
            $table->string('item');
            $table->string('description');
            $table->string('info');
            $table->string('picture');
            $table->decimal('price');
            $table->unsignedBigInteger('menu_section_id');
            $table->foreign('menu_section_id')->references('id')->on('menu_sections');
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
        Schema::dropIfExists('menu_items');
        Schema::dropIfExists('menu_section');
        Schema::dropIfExists('menus');
    }
}
