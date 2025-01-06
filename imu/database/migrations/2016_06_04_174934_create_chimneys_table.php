<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChimneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chimneys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('desc');
            $table->float('width')->nullable();
            $table->text('content');
            $table->string('type')->default('одностенный');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('chimneys');
    }
}
