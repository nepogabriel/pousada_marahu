<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('birth_date');
            $table->integer('postcode')->nullable();
            $table->string('country')->nullable();
            $table->string('zone')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
            $table->string('street')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn('birth_date');
            $table->dropColumn('postcode');
            $table->dropColumn('country');
            $table->dropColumn('zone');
            $table->dropColumn('city');
            $table->dropColumn('district');
            $table->dropColumn('street');
        });
    }
}
