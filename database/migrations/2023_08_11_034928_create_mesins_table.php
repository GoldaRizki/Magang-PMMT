<?php

use App\Models\User;
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
            $table->foreignId('ruang_id')->onDelete('cascade')->onUpdate('cascade');
            $table->string('no_asset', 25)->nullable();
            $table->text('spesifikasi')->nullable();
            $table->string('tipe_mesin', 40)->nullable();
            $table->string('kode_mesin', 6)->nullable();
            $table->string('nomor_seri', 50)->nullable();
            $table->foreignId('user_id')->default(1);
            $table->timestamps();
            $table->softDeletes();

           
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
