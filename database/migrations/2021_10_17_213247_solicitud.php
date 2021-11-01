<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Solicitud extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('institucion');
            $table->string('descripcion')->nullable();
            $table->string('estado');
            $table->date('fecha');
            $table->binary('orden_medica')->nullable();
            $table->binary('comprobante')->nullable();
            $table->integer('afiliate')->unsigned()->nullable();
            $table->foreign('afiliate')->references('dni')->on('afiliate')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitud');
    }
}
