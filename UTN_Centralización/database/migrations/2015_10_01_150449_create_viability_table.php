<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViabilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viability', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_name');
            $table->string('viability_number')->nullable();
            $table->string('setena_administrative_record');
            $table->string('cadrastal_plane_number');
            $table->string('property_number');
            $table->string('province');
            $table->string('canton');
            $table->string('district');
            $table->string('coordinate');
            $table->string('path')->nullable();
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
        Schema::drop('viability');
    }
}
