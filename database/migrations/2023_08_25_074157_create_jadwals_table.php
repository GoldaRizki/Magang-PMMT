<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {

            $table->id();
            $table->foreignId('maintenance_id');
            //$table->unsignedBigInteger('maintenance_id');
            $table->dateTime('tanggal_rencana');
            $table->dateTime('tanggal_realisasi')->nullable();
            $table->timestamps();

            //$table->foreign('maintenance_id')->references('id')->on('maintenances');
        });

        /*

        Schema::table('jadwals', function (Blueprint $table) {
            //$table->foreignId('maintenance_id')->constrained()->cascadeOnDelete();
            $table->foreign('maintenance_id')->references('id')->on('maintenances');
        });

        */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwals');

    }
}
