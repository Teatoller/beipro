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
            $table->float('diesel_price')->nullable();
            $table->float('petrol_price')->nullable();
            $table->float('kerosene_price')->nullable();
            $table->float('ido_price')->nullable();
            $table->float('fo_price')->nullable();
            $table->float('lpg_price')->nullable();
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
