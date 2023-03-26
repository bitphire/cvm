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
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('role_as')->default('0')->comment('0=user, 1=employee, 2=supervisor, 3=admin');
            $table->String('cell_phone')->default('5555555555');
            $table->tinyInteger('active')->default('1')->comment('0=unable to make changes, 1=can make changes');
            $table->tinyInteger('approved')->default('0')->comment('0=new register, 1=confirmed employee');
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_as');
            $table->dropColumn('cell_phone');
            $table->dropColumn('active');
            $table->dropColumn('approved');
            $table->dropColumn('company_id');
        });
    }
};
