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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Email');
            $table->string('Observacao');
            $table->date('Data');
            $table->time('Hora');
            $table->integer('QTD_Pessoas');
            $table->unsignedBigInteger('User_id'); 
            $table->foreign('User_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('Mesa_id'); 
            $table->foreign('Mesa_id')->references('id')->on('mesas')->onDelete('cascade');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
