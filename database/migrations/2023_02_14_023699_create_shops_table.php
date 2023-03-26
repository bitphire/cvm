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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('district');
            $table->string('address')->nullable();
            $table->string('city');
            $table->string('zip')->nullable();;
            $table->string('phone');
            $table->tinyInteger('do_not_use')->default('0')->comment('0=use, 1=do not user');
            $table->tinyInteger('priority')->default('0');
            $table->string('works_on');
            $table->string('type');
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
        Schema::dropIfExists('shops');
    }
};
