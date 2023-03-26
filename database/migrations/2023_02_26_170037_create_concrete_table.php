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
        Schema::create('concrete', function (Blueprint $table) {
            $table->id();
            $table->string('task');
            $table->string('sign');
            $table->tinyInteger('leg_size')->default('0')->comment('0=uknown, 1=w6x15, 2=w8x18, 3=stp 400, 4=sch80, 5=sch10, 6=w6x12, 7=s7x7.4');
            $table->smallInteger('offset_1');
            $table->smallInteger('offset_2');
            $table->tinyInteger('sign_size')->default('0')->comment('0=unknown, 1=5Panel, 2=7Panel, 3=10Panel, 4=11Panel, 5=Verticle, 6=10x10, 7=R1, 8=R2, 9=R3, 10=R4, 11=R6, 12=TODS');
            $table->smallInteger('leg_length_1')->default('0');
            $table->smallInteger('leg_length_2')->default('0');
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
        Schema::dropIfExists('concrete');
    }
};
