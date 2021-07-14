<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_albums', function (Blueprint $table) {
            $table->id();
            $table->foreignId('album_id')->constrained('albums');
            $table->string('title');
            $table->string('content');
            $table->text('details');
            $table->string('image'); //cover image
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
        Schema::dropIfExists('sub_albums');
    }
}
