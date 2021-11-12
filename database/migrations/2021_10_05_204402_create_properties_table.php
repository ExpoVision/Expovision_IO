<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('title');
            $table->integer('price');
            $table->json('photos')->nullable();
            $table->integer('rooms');
            $table->integer('bathrooms');
            $table->string('developer');
            $table->string('address');
            $table->json('coordinates');
            $table->string('scene')->nullable();
            $table->date('deadline')->nullable();
            $table->text('description');
            $table->string('building_type');
            $table->string('district');
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
