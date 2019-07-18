<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNairobiPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nairobi_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('marketer_name');
            $table->string('diesel');
            $table->integer('diesel_price');
            $table->string('petrol');
            $table->integer('petrol_price');
            $table->string('kerosene');
            $table->integer('kerosene_price');
            $table->string('ido');
            $table->integer('ido_price');
            $table->string('fo');
            $table->integer('fo_price');
            $table->string('lpg');
            $table->integer('lpg_price');
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
        Schema::dropIfExists('nairobi_prices');
    }
}
