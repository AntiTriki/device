<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeripheralassignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peripheralassignments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('idpc')->nullable()->unsigned();
            $table->foreign('idpc')->references('id')->on('pcs')->onDelete('cascade');
            $table->integer('idperipheral')->nullable()->unsigned();
            $table->foreign('idperipheral')->references('id')->on('peripherals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peripheralassignments');
    }
}
