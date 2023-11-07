<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idpersona')->nullable();
            $table->string('usuario')->unique()->nullable();
            $table->string('correo')->unique();
            $table->string('clave');
            $table->string('habilitado')->nullable();
            $table->date('fecha')->nullable();
            $table->unsignedBigInteger('idrol')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('usuariocreacion')->nullable();
            $table->unsignedBigInteger('usuariomodificacion')->nullable();
            $table->foreign('idpersona')->references('id')->on('personas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('idrol')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
