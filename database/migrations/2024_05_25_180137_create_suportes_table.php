<?php

// Example: 2023_05_25_000000_create_suportes_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuportesTable extends Migration
{
    public function up()
    {
        Schema::create('suportes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // This line ensures the user_id column is created and constrained.
            $table->string('categoria');
            $table->string('informacao');
            $table->text('descricao');
            $table->string('carater');
            $table->string('protocolo')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('suportes');
    }
}
