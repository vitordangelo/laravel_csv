<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRouteTable extends Migration
{
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('origin');
            $table->string('destination');
            $table->float('price');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('routes');
    }
}
