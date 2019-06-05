<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentassignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipmentassignments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('iduser')->nullable()->unsigned();
            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');
            $table->integer('idpc')->nullable()->unsigned();
            $table->foreign('idpc')->references('id')->on('pcs')->onDelete('cascade');
            $table->integer('idperipheral')->nullable()->unsigned();
            $table->foreign('idperipheral')->references('id')->on('peripherals')->onDelete('cascade');
            $table->integer('idoccurence')->nullable()->unsigned();
            $table->foreign('idoccurence')->references('id')->on('occurences')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipmentassignments');
    }
}
