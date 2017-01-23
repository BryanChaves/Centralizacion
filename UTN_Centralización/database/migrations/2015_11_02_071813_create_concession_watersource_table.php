<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConcessionWatersourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concession_watersource', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('concession_id')->unsigned();   
            $table->foreign('concession_id')
                ->references('id')
                ->on('concession')
                ->onDelete('cascade');
            $table->integer('watersource_id')->unsigned();   
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
        Schema::drop('concession_watersource');
    }
}
