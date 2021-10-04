<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlanPrestation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PlanPrestation', function (Blueprint $table) {
            $table->id();
            $table->integer('percentage');
            $table->integer('plan_id');
            $table->integer('prestation_id');

            $table->foreign('plan_id')->references('id')->on('plan')->onDelete('cascade');
            $table->foreign('prestation_id')->references('id')->on('prestation')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PlanPrestation');
    }
}
