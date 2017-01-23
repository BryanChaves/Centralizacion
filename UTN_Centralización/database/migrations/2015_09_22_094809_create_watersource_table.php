<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWatersourceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('watersource', function (Blueprint $table) {
            $table->increments('id');
            $table->string('watersource_name');
            $table->mediumText('address');
            $table->string('coordinate_CRTM05');
            $table->mediumText('observations');
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
        Schema::drop('watersource');
    }
}
