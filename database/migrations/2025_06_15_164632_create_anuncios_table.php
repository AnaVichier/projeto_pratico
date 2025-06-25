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
       Schema::create('anuncios', function (Blueprint $table) {
        $table->id('id_anuncio');
        $table->string('titulo', 255);
        $table->text('descricao');
        $table->decimal('preco', 10, 2);
        $table->date('data_publicacao');

        
        $table->unsignedBigInteger('id_proprietario');
        $table->foreign('id_proprietario')->references('id_proprietario')->on('proprietarios')->onDelete('cascade');

        
        $table->unsignedBigInteger('id_veiculo')->unique();
        $table->foreign('id_veiculo')->references('id_veiculo')->on('veiculos')->onDelete('cascade');

});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anuncios');
    }
};
