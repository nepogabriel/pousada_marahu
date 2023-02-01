<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPeopleToAccommodationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accommodation', function (Blueprint $table) {
            $table->integer('min_people')->default(0);
            $table->integer('max_people')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accommodation', function (Blueprint $table) {
            $table->dropColumn('min_people');
            $table->dropColumn('max_people');
        });
    }
}
