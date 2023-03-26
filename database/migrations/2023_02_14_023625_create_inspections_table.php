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
        Schema::create('inspections', function (Blueprint $table) {
            $table->id();
            $table->integer('mileage');
            $table->tinyInteger('external_damage');
            $table->tinyInteger('leaks_under');
            $table->tinyInteger('leaks_engine');
            $table->tinyInteger('oil_level');
            $table->tinyInteger('coolant_level');
            $table->tinyInteger('power_steering_level');
            $table->tinyInteger('transmission_level');
            $table->tinyInteger('horn');
            $table->tinyInteger('wiper_blades');
            $table->tinyInteger('washer_level');
            $table->tinyInteger('lights');
            $table->tinyInteger('mirrors');
            $table->tinyInteger('fire_extinguisher');
            $table->tinyInteger('first_aid_kit');
            $table->tinyInteger('psi_df');
            $table->tinyInteger('psi_dro');
            $table->tinyInteger('psi_dri')->nullable();
            $table->tinyInteger('psi_pf');
            $table->tinyInteger('psi_pro');
            $table->tinyInteger('psi_pri')->nullable();
            $table->tinyInteger('psi_spare')->nullable();
            $table->text('comments')->nullable();
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->unsignedBigInteger('completed_by_id');
            $table->unsignedBigInteger('vehicle_id');

            $table->foreign('driver_id')->references('id')->on('users');
            $table->foreign('completed_by_id')->references('id')->on('users');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');

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
        Schema::dropIfExists('inspections');
    }
};
