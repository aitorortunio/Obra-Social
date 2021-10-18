<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSolicitudToAfiliate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('afiliate', function (Blueprint $table) {
            $table->integer('solicitud_id')->nullable()->unsigned();
            $table->foreign('solicitud_id')->references('id')->on('solicitud');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('afiliate', function (Blueprint $table) {
            //
        });
    }
}
