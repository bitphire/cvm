<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tires', function (Blueprint $table) {
            $table->id();
            $table->string('size');
            $table->string('brand');
            $table->string('model')->nullable();
            $table->tinyInteger('type')->default('0')->comment('0=street, 1=all terrain, 2=off road, 3=other');
            $table->tinyInteger('has_warranty')->default('0')->comment('0=no, 1=yes');
            $table->integer('warranty_mileage')->nullable();
            $table->decimal('price', $precision=13, $scale=2);
            $table->string('placement');
            $table->date('purchased_on');
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('shop_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('shop_id')->references('id')->on('shops');
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
        Schema::dropIfExists('tires');
    }
};
