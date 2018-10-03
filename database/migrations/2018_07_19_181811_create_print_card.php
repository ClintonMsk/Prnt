<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrintCard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('print_card', function (Blueprint $table) {
            $table->increments('card_id');
            $table->string('card_code');
            $table->string('card_title');
            $table->text('card_description');
            $table->string('card_product');
            $table->string('card_dimension');
            $table->string('card_type');
            $table->string('card_printing_time');
            $table->string('card_cover');
            $table->string('card_folder');
            $table->double('card_price');
            $table->string('card_date_time');
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
        Schema::dropIfExists('print_card');
    }
}
