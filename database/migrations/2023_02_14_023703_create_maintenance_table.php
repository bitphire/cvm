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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->decimal('tax', $precision = 13, $scale = 2)->nullable();
            $table->decimal('total', $precision = 13, $scale = 2)->nullable();
            $table->text('description');
            $table->date('dropped_off_on');
            $table->date('picked_up_on')->nullable();
            $table->unsignedBigInteger('vehicle_id');
            $table->unsignedBigInteger('dropped_off_by_id');
            $table->unsignedBigInteger('picked_up_by_id')->nullable();
            $table->unsignedBigInteger('shop_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('dropped_off_by_id')->references('id')->on('users');
            $table->foreign('picked_up_by_id')->references('id')->on('users');
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
        Schema::dropIfExists('maintenances');
    }
};
