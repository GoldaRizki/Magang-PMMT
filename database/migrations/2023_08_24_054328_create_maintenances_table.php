<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->String('nama_maintenance');
            $table->foreignId('mesin_id');
            $table->integer('periode');
            $table->enum('satuan_periode', ['Jam', 'Hari', 'Minggu', 'Bulan', 'Tahun'])->default('Jam');
            $table->dateTime('start_time');
            $table->char('warna', 7);
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
        Schema::dropIfExists('maintenances');
    }
}
