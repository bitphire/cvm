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
        Schema::create('maint_details', function (Blueprint $table) {
            $table->id();
            $table->string('job');
            $table->decimal('parts', $precision = 13, $scale = 2)->nullable();
            $table->decimal('labor', $precision = 13, $scale = 2)->nullable();
            $table->text('comments')->nullable();
            $table->unsignedBigInteger('maintenance_id');
            $table->foreign('maintenance_id')->references('id')->on('maintenances');
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
        Schema::dropIfExists('maint_details');
    }
};
