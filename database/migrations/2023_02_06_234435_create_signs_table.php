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
        Schema::create('signs', function (Blueprint $table) {
            $table->id();
            $table->String('sign_id');
            $table->tinyInteger('type')->default('0')->comment('0=S6, 1=S3, 2=R1, 3=R2, 4=R3, 5=R4, 6=R6, 7=S1');
            $table->tinyInteger('size')->default('0')->comment('0=10, 1=11, 2=15, 3=10x10, 4=other');
            $table->tinyInteger('leg_size')->default('0')->comment('0=W6x15, 1=W8x18, 2=Schedule 80, 3=Schedule 10, 4=STP 400, 5=other');
            $table->Integer('leg_one')->default('84');
            $table->Integer('leg_two')->default('84');
            $table->Integer('leg_one_offset')->default('84');
            $table->Integer('leg_two_offset')->default('84');
            $table->String('header_one')->default('0');
            $table->String('header_two')->default('0');
            $table->String('header_three')->default('0');
            $table->String('header_four')->default('0');
            $table->String('header_five')->default('0');
            $table->String('header_six')->default('0');
            $table->String('direction_one')->default('0');
            $table->String('direction_two')->default('0');
            $table->String('direction_three')->default('0');
            $table->String('direction_four')->default('0');
            $table->String('direction_five')->default('0');
            $table->String('direction_six')->default('0');
            $table->String('distance_one')->default('0');
            $table->String('distance_two')->default('0');
            $table->String('distance_three')->default('0');
            $table->String('distance_four')->default('0');
            $table->String('distance_five')->default('0');
            $table->String('distance_six')->default('0');
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
        Schema::dropIfExists('signs');
    }
};
