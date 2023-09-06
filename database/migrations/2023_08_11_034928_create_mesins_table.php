<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMesinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mesins', function (Blueprint $table) {
            
            $table->id();
            $table->string('nama_mesin');
            //$table->foreignId('kategori_id');
            $table->unsignedBigInteger('kategori_id');

            $table->foreignId('ruang_id');
            $table->text('spesifikasi')->nullable();
            $table->timestamps();

          //  $table->unique(['kategori_id']);
           $table->foreign('kategori_id')->references('id')->on('kategoris')->cascadeOnDelete('cascade');

            //$table->foreign('kategori_id')->references('id')->on('kategoris')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mesins');
    }

   
}
