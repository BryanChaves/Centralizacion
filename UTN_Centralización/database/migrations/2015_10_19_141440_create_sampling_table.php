<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSamplingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sampling', function (Blueprint $table) {
            $table->increments('id');
            $table->string('consecutive');
            $table->string('label');
            $table->string('level');
            $table->integer('sampling_site_id')->unsigned()->nullable();   
            $table->foreign('sampling_site_id')
                ->references('id')
                ->on('sampling_site')
                ->onDelete('cascade');
            $table->integer('analysis_id')->unsigned()->nullable(); 
            $table->foreign('analysis_id')
                ->references('id')
                ->on('analysis')
                ->onDelete('cascade');
            $table->integer('watersource_id')->unsigned()->nullable();   
            $table->foreign('watersource_id')
                ->references('id')
                ->on('watersource')
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
        Schema::drop('sampling');
    }
}
