<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->mediumText('address');
            $table->string('email')->unique();
            $table->string('telephone_number');
            $table->mediumText('description');
            $table->integer('rol_id')->unsigned();   
            $table->foreign('rol_id')
                ->references('id')
                ->on('rol')
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
        Schema::drop('entity');
    }
}
