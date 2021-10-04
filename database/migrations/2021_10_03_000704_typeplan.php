<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TypePlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TypePlan', function (Blueprint $table) {
            $table->id();
            $table->double('price');
            $table->boolean('state'); //Activo/Inactivo
            $table->integer('type_id');
            $table->integer('plan_id');

            $table->foreign('plan_id')->references('id')->on('plan')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('type')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TypePlan');
    }
}
