<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');

            $table->string('slug')->nullable();
            $table->string('title');
            $table->text('preview')->nullable();
            $table->text('description')->nullable();
            $table->string('price')->nullable();
            $table->string('image')->nullable();

            $table->string('type')->nullable(); // дом / участок / квартира
            $table->string('rooms')->nullable(); //кол-во комнат
            $table->string('classification')->nullable(); // новострой / вторичное
            $table->string('floor')->nullable(); // этаж
            $table->string('address')->nullable();

            $table->string('total_area')->nullable();
            $table->string('living_area')->nullable();
            $table->string('kitchen_area')->nullable();
            $table->string('land_area')->nullable();

            $table->string('status')->nullable(); //продано / зарезервировано

            $table->unsignedInteger('visits')->nullable();

            $table->boolean('enabled')->nullable()->default(true);

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
        Schema::dropIfExists('properties');
    }
}
