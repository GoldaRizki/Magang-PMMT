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
            $table->foreignId('maintenance_id')->cascadeOnDelete();
            //$table->unsignedBigInteger('maintenance_id');
            $table->dateTime('tanggal_rencana');
            $table->dateTime('tanggal_realisasi')->nullable();
            $table->text('keterangan')->nullable();
            $table->text('alasan')->nullable();
            $table->string('lama_pekerjaan', 18)->nullable();
            $table->string('personel')->nullable();
            $table->unsignedSmallInteger('status')->default(1);
            $table->timestamps();
            $table->softDeletes();


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
