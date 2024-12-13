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
        Schema::create('users_tbl', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nome', 50);
            $table->string('cep', 50)->default('0');
            $table->string('endereco', 50);
            $table->string('bairro', 50);
            $table->string('cidade', 50);
            $table->string('uf', 50);
            $table->string('telefone', 50)->default('0');
            $table->string('email', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_tbl');
    }
};
