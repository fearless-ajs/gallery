<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpenHouseDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('open_house_dates', function (Blueprint $table) {
            $table->id();
            $table->string('start_date');
            $table->string('start_time');
            $table->string('start_timestamp');
            $table->string('end_date');
            $table->string('end_time');
            $table->string('end_timestamp');
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
        Schema::dropIfExists('open_house_dates');
    }
}
