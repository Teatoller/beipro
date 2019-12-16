<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrentPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('current_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('diesel')->nullable();
            $table->float('petrol')->nullable();
            $table->float('kerosene')->nullable();
            $table->float('ido')->nullable();
            $table->float('fo')->nullable();
            $table->float('lpg')->nullable();
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
        Schema::dropIfExists('current_prices');
    }
}
