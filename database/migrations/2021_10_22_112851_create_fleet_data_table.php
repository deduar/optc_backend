<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFleetDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fleet_data', function (Blueprint $table) {
            $table->id();
            $table->string('carId');
            $table->string('make');
            $table->string('model');
            $table->string('description');
            $table->string('segment');
            $table->string('vehicle_type');
            $table->string('body_style');
            $table->string('introduction_date');
            $table->string('end_date');
            $table->integer('number_doors');
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
        Schema::dropIfExists('fleet_data');
    }
}
