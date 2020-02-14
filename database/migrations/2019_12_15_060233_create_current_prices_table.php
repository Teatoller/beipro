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
            $table->bigInteger('front_office_id');
            $table->decimal('diesel', 8, 2)->nullable();
            $table->decimal('petrol', 8, 2)->nullable();
            $table->decimal('kerosene', 8, 2)->nullable();
            $table->decimal('ido', 8, 2)->nullable();
            $table->decimal('fo', 8, 2)->nullable();
            $table->decimal('lpg', 8, 2)->nullable();
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
