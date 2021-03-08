<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('color');
            $table->string('imagen');
            $table->integer('edad');
            $table->unsignedBigInteger('kind_id');
            $table->unsignedBigInteger('habitad_id');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('kind_id')->references('id')->on('kinds');
            $table->foreign('habitad_id')->references('id')->on('habitats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
