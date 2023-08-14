<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangPekerjaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('barang_id');
            $table->unsignedBigInteger('pekerjaan_id');

            $table->timestamps();

            $table->unique(['barang_id', 'pekerjaan_id']);
            $table->foreign('barang_id')->references('id')->on('barangs');
            $table->foreign('pekerjaan_id')->references('id')->on('pekerjaans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_pekerjaan');
    }
}
