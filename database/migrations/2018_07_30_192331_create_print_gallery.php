<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrintGallery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('print_gallery', function (Blueprint $table) {
            $table->increments('gal_cid');
            $table->string('gal_code');
            $table->string('gal_code_content');
            $table->string('gal_o_name');
            $table->string('gal_name');
            $table->string('gal_folder');
            $table->timestamp('gal_date');
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
        Schema::dropIfExists('print_gallery');
    }
}
