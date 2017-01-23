<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEntityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_entity', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();   
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->integer('entity_id')->unsigned();   
            $table->foreign('entity_id')
                ->references('id')
                ->on('entity')
                ->onDelete('cascade');
            $table->date('created_at');
            $table->date('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *sampling site name
     * @return void
     */
    public function down()
    {
        Schema::drop('user_entity');
    }
}
