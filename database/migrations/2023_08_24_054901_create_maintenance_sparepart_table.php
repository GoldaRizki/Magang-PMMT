<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenanceSparepartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_sparepart', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('sparepart_id');
            $table->unsignedBigInteger('maintenance_id');
            $table->integer('jumlah');

            $table->timestamps();
            $table->unique(['sparepart_id', 'maintenance_id']);
            $table->foreign('sparepart_id')->references('id')->on('spareparts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('maintenance_id')->references('id')->on('maintenances')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenance_sparepart');
    }
}
