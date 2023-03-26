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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->date('purchased_on');
            $table->unsignedSmallInteger('unit_number');
            $table->string('state_used_in')->default('TX');
            $table->string('type');
            $table->string('year');
            $table->string('make');
            $table->string('model');
            $table->string('vin');
            $table->string('license');
            $table->string('toll_tag')->nullable();
            $table->string('registration')->nullable();
            $table->string('type_description');
            $table->string('front_psi')->nullable();
            $table->string('rear_psi')->nullable();
            $table->integer('oil_threshold')->nullable();
            $table->integer('fuel_threshold')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedTinyInteger('ownership')->default('0')->comment('0=Owned, 1=Leased, 2=Rented');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('driver_id');
            $table->unsignedBigInteger('company_id');
            $table->foreign('driver_id')->references('id')->on('users');
            $table->foreign('company_id')->references('id')->on('companies');
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
};
