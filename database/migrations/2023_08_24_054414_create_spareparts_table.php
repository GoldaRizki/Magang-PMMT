<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSparepartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spareparts', function (Blueprint $table) {
            $table->unsignedInteger('id');
            $table->String('nama_sparepart');
            $table->integer('harga');
            $table->integer('jumlah');
            $table->enum('satuan', ['Pcs','Kg', 'Buah', 'Pak', 'Biji', 'Liter']);

            $table->softDeletes();
            $table->timestamps();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spareparts');
    }
}
