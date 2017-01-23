<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParameterLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameter_level', function (Blueprint $table) {
            $table->increments('id');
            $table->string('level');
            $table->integer('parameter_id')->unsigned();   
            $table->foreign('parameter_id')
                ->references('id')
                ->on('parameter')
                ->onDelete('cascade');
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('parameter_level');
    }
}
