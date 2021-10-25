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
            $table->integer('introduction_date');
            $table->integer('end_date')->nullable();
            $table->integer('number_doors');
            $table->integer('number_seats');
            $table->string('fuel_type');
            $table->integer('power_cv');
            $table->integer('power_kw');
            $table->string('transmision_type');
            $table->string('model_year');
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
