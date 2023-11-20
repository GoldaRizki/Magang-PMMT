<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $ruang = [  'Gedung A', 'Gedung B', 'Gedung C', 'Gedung D', 'Gedung E', 'Gedung F', 'Gedung G', 'Gedung H', 'Gedung I',
                    'Gedung J', 'Gedung K', 'Gedung L', 'Gedung M', 'Gedung N', 'Gedung O', 'Gedung P', 'Gedung Q', 'Gedung R',
                    'Gedung S', 'Gedung T', 'Gedung U', 'Gedung V', 'Gedung W', 'Gedung X', 'Gedung Y', 'Gedung Z', 'Gedung AA',
                    'Gedung AB', 'Gedung AC'
                ];
        Schema::create('ruangs', function (Blueprint $table) use ($ruang){
            $table->id();
            $table->String('nama_ruang');
            $table->String('no_ruang');
            $table->enum('bagian', $ruang);
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
        Schema::dropIfExists('ruangs');
    }
}
