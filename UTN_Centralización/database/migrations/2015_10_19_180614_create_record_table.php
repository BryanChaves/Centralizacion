<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sampling_id')->unsigned();   
            $table->foreign('sampling_id')
                ->references('id')
                ->on('sampling')
                ->onDelete('cascade');
            $table->integer('parameter_id')->unsigned();   
            $table->foreign('parameter_id')
                ->references('id')
                ->on('parameter')
                ->onDelete('cascade');
            $table->string('value');
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
        Schema::drop('record');
    }
}
