<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOccurencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occurences', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('descripcion');
            $table->date('fecha_creacion')->nullable();
            $table->date('fecha_culminacion')->nullable();
            $table->integer('idstate')->nullable()->unsigned();
            $table->foreign('idstate')->references('id')->on('states')->onDelete('cascade');
            $table->integer('idtype')->nullable()->unsigned();
            $table->foreign('idtype')->references('id')->on('types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('occurences');
    }
}
