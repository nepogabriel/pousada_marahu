<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('code', 10);
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_accommodation');
            $table->unsignedBigInteger('id_payment');
            $table->dateTime('entry_date');
            $table->dateTime('exit_date');
            $table->text('description');
            $table->string('image');
            $table->decimal('value', 5, 2);
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_accommodation')->references('id')->on('accommodation');
            $table->foreign('id_payment')->references('id')->on('payment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation');
    }
}
