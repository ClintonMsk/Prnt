<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrintGift extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('print_gift', function (Blueprint $table) {
            $table->increments('gift_id');
            $table->string('gift_code');
            $table->string('gift_title');
            $table->text('gift_detail');
            $table->string('gift_folder');
            $table->string('gift_cover');
            $table->dateTime('gift_date_add');
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
        Schema::dropIfExists('print_gift');
    }
}
