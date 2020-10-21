<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actas', function (Blueprint $table) {
            $table->id();
            $table->date("fecha");
            $table->time("horainicio");
            $table->time("horafin");
            $table->integer("lista1");
            $table->integer("lista2");
            $table->integer("lista3");
            $table->integer("blancos");
            $table->integer("nulos");
            $table->integer("total");
            $table->string("observaciones");
            $table->foreignId("mesa_id")->references("id")->on("mesas");
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
        Schema::dropIfExists('actas');
    }
}
