<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('listing_id');
            $table->string('make');
            $table->string('model')->nullable();
            $table->integer('milleage')->nullable();
            $table->integer('engine')->nullable();
            $table->integer('year');
            $table->string('edition')->nullable();
            $table->string('transmission')->nullable();
            $table->string('fuel')->nullable();
            $table->integer('door')->nullable();
            $table->integer('seat')->nullable();
            $table->string('drivetype');
            $table->string('condition');
            $table->string('bodytype');
            $table->string('vehicle_price');
            $table->string('vehicle_color');
            $table->string('vehicle_price_detail');
            $table->text('description');
            $table->text('images');
            $table->text('vehicle_slug');
            $table->boolean('vehicle_status')->nullable();
            $table->boolean('vehicle_approval')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}
