<?php

namespace Database\Seeders;

use App\Models\Mesin;
use App\Models\Pekerjaan;
use App\Models\Barang;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();

        Mesin::create([
            'nama_mesin' => 'Mesin Genset Supra',
            'kategori_id' => 1
        ]);





        Pekerjaan::create([
            'nama_pekerjaan' => 'ganti oli',
            'mesin_id' => 1,
           
            'periode' => 3,
            'satuan_periode' => 'B',
            'start_time' => Carbon::parse('12-3-2023 23:58:36')
        ]);

        Pekerjaan::create([
            'nama_pekerjaan' => 'ganti vanbelt',
            'mesin_id' => 1,
           
            'periode' => 3,
            'satuan_periode' => 'B',
            'start_time' => Carbon::parse('13-5-2023 23:58:36')
        ]);

        Pekerjaan::create([
            'nama_pekerjaan' => 'manasi mesin',
            'mesin_id' => 1,
           
            'periode' => 3,
            'satuan_periode' => 'B',
            'start_time' => Carbon::parse('2-4-2023 5:34:36')
        ]);



        Barang::create([
            'id' => 1,
            'nama_barang' => 'Oli MPX',
        ]);

        Barang::create([
            'id' => 3,
            'nama_barang' => 'vanbelt mio',
        ]);
        Barang::create([
            'id' => 345,
            'nama_barang' => 'baut ukuran 10',
        ]);
        Barang::create([
            'id' => 236,
            'nama_barang' => 'laker',
        ]);


        Pekerjaan::find(1)->barang()->attach([345, 3]);
        Pekerjaan::find(2)->barang()->attach([1, 236]);
        Pekerjaan::find(3)->barang()->attach([1, 236]);






    }
}
