<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Afiliate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('afiliate', function (Blueprint $table) {
            $table->integer('dni')->primary();
            $table->string('dni_type');
            $table->string('name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->string('province');
            $table->string('city');
            $table->string('street');
            $table->integer('house_number');
            $table->string('email')->unique();
            $table->integer('tel');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('afiliate');
    }
}
