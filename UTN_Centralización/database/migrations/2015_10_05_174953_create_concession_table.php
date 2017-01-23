<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConcessionTable extends Migration
{
    
    public function up()
    {
        Schema::create('concession', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agent_id');
            $table->string('agent_number');
            $table->date('conferment_date'); 
            $table->date('due_date');
            $table->string('owner');
            $table->string('property_number');
            $table->string('water_tapping_point');
            $table->string('authorized_use');
            $table->string('assigned_flow');
            $table->string('capacity_flow');
            $table->string('path')->nullable();
            
            $table->integer('resolution_id')->unsigned();   
            $table->foreign('resolution_id')
                ->references('id')
                ->on('resolution')
                ->onDelete('cascade');

            $table->integer('file_id')->unsigned();   
            $table->foreign('file_id')
                ->references('id')
                ->on('file')
                ->onDelete('cascade');

            $table->integer('fileType_id')->unsigned();   
            $table->foreign('fileType_id')
                ->references('id')
                ->on('file_type')
                ->onDelete('cascade');

            $table->integer('viability_id')->unsigned();   
            $table->foreign('viability_id')
                ->references('id')
                ->on('viability')
                ->onDelete('cascade');

            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    public function down()
    {
        Schema::drop('concession');
    }
}
