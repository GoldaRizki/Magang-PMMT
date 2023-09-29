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
            $table->foreignId('kategori_id')->default(1);
            $table->foreignId('ruang_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('no_asset', 25);
            $table->text('spesifikasi')->nullable();
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
        Schema::dropIfExists('mesins');
    }

   
}
