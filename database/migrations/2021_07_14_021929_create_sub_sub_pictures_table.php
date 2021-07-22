<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubSubPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_sub_pictures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_sub_album_id')->constrained('sub_sub_albums');
            $table->string('caption')->nullable();
            $table->string('optimized_image');
            $table->string('original_image');
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
        Schema::dropIfExists('sub_sub_pictures');
    }
}
