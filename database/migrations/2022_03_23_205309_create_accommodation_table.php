<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccommodationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accommodation', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->decimal('value', 5, 2)->nullable();
            $table->decimal('adult_value', 5)->nullable();
            $table->decimal('child_value', 5)->nullable();
            $table->decimal('pet_value', 5)->nullable();
            $table->string('image', 255)->nullable();
            $table->integer('double_bed')->nullable();
            $table->integer('single_bed')->nullable();
            $table->integer('air_conditioning')->nullable();
            $table->integer('tv')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('accommodation');
    }
}
