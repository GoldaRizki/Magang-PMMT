<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalSparepart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_sparepart', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('sparepart_id');
            $table->unsignedBigInteger('jadwal_id');
            $table->integer('jumlah');

            $table->timestamps();
            $table->unique(['sparepart_id', 'jadwal_id']);
            $table->foreign('sparepart_id')->references('id')->on('spareparts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('jadwal_id')->references('id')->on('jadwals')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_sparepart');
    }
}
