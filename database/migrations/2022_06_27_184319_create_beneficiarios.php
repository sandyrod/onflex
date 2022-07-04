<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->id();
            $table->string('cedula', 15);
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('email', 75);
            $table->string('telefono', 15);
            $table->string('sexo');
            $table->unsignedBigInteger('transportista_id');
            $table->foreign('transportista_id')->references('id')->on('transportista');
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
        Schema::table('beneficiarios', function(Blueprint $table){
            $table->dropForeign(['transportista_id']);
        });
        Schema::dropIfExists('beneficiarios');
    }
};
