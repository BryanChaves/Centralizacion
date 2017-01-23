<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlowMeasurementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('flow_measurement', function (Blueprint $table) {
            $table->increments('id');
            $table->string('capacity');
            $table->string('method');
            $table->mediumText('observations');
            $table->date('date');
            $table->string('weather');
            $table->integer('watersource_id')->unsigned()->nullable();    
            $table->foreign('watersource_id')
                ->references('id')
                ->on('watersource')
                ->onDelete('cascade');
            $table->integer('sampling_site_id')->unsigned()->nullable();     
            $table->foreign('sampling_site_id')
                ->references('id')
                ->on('sampling_site')
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
        Schema::drop('flow_measurement');
    }
}
