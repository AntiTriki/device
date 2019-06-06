<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('apellido_p')->nullable();
            $table->string('apellido_m')->nullable();
            $table->string('ci')->nullable();
            $table->boolean('sexo')->nullable();
            $table->integer('celular')->nullable();
            $table->date('birthday')->nullable();
            $table->integer('permiso')->default(0);
            $table->integer('idposition')->nullable()->unsigned();
            $table->foreign('idposition')->references('id')->on('positions')->onDelete('cascade');
            $table->integer('idbranch')->nullable()->unsigned();
            $table->foreign('idbranch')->references('id')->on('branches')->onDelete('cascade');
            $table->integer('idarea')->nullable()->unsigned();
            $table->foreign('idarea')->references('id')->on('areas')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
