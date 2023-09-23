<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetupMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setup_maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('nama_setup_maintenance');
            $table->foreignId('kategori_id')->constrained()->onDelete('cascade');
            $table->integer('periode')->default(0);
            $table->enum('satuan_periode', ['Jam', 'Hari', 'Minggu', 'Bulan', 'Tahun'])->default('Jam');
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
        Schema::dropIfExists('setup_maintenances');
    }
}
