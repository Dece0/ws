<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhysicalQuantitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_quantities', function (Blueprint $table) {
            $table->tinyIncrements('physical_quantity_id')->unsigned();
            $table->string('quantity_name', 30);
            $table->string('unit_name', 20);
            $table->string('unit_symbol', 10);
            $table->tinyInteger('sensor_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('physical_quantities');
    }
}
