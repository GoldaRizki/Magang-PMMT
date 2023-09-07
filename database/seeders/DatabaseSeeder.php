<?php

namespace Database\Seeders;

use App\Models\Mesin;
use App\Models\Pekerjaan;
use App\Models\Ruang;
use App\Models\Kategori;
use App\Models\Maintenance;
use App\Models\Sparepart;
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
        Kategori::create([
            'nama_kategori' => 'AC'
        ]);
        Kategori::create([
            'nama_kategori' => 'Chiller'
        ]);
        Kategori::create([
            'nama_kategori' => 'Genset'
        ]);


        Ruang::create([
            'nama_ruang' => 'Produksi',
            'no_ruang' => 'A123',
            'bagian' => 'Keuangan'
        ]);
        
        Ruang::create([
            'nama_ruang' => 'Administrasi',
            'no_ruang' => 'A69',
            'bagian' => 'Manajemen'
        ]);

        Ruang::create([
            'nama_ruang' => 'Kamar Mandi',
            'no_ruang' => '23456',
            'bagian' => 'Admin'
        ]);


        
        Mesin::create([
            'nama_mesin' => 'Mesin Genset Supra',
            'kategori_id' => 1,
            'ruang_id' => 1,
            'spesifikasi' => 'Pokoke apik'

        ]);
        Mesin::create([
            'nama_mesin' => 'Mesin Genset Mitsubishi 250KVA wes apik lah pokoke',
            'kategori_id' => 2,
            'ruang_id' => 2,
            'spesifikasi' => 'Konsumsi dayane 250v, yo ngono kae'
        ]);

        Mesin::create([
            'nama_mesin' => 'Chiller 1',
            'kategori_id' => 2,
            'ruang_id' => 3,
            'spesifikasi' => 'Konsumsi dayane 250v, yo ngono kae'
        ]);

        Mesin::create([
            'nama_mesin' => 'Chiller 2',
            'kategori_id' => 3,
            'ruang_id' => 1,
            'spesifikasi' => 'Alah mboh meh tak isi opo sembarang /r/n Iki yo mung gawe pemanis'
        ]);


/*

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


*/

Maintenance::create([
    'nama_maintenance' => 'ganti oli',
    'mesin_id' => 1,
   
    'periode' => 3,
    'satuan_periode' => 'B',
    'start_time' => Carbon::parse('12-3-2023 23:58:36')
]);

Maintenance::create([
    'nama_maintenance' => 'ganti vanbelt',
    'mesin_id' => 1,
   
    'periode' => 3,
    'satuan_periode' => 'B',
    'start_time' => Carbon::parse('13-5-2023 23:58:36')
]);

Maintenance::create([
    'nama_maintenance' => 'manasi mesin',
    'mesin_id' => 1,
   
    'periode' => 3,
    'satuan_periode' => 'B',
    'start_time' => Carbon::parse('2-4-2023 5:34:36')
]);

/*
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

*/

Sparepart::create([
    'id' => 1,
    'nama_sparepart' => 'Oli MPX',
]);

Sparepart::create([
    'id' => 3,
    'nama_sparepart' => 'vanbelt mio',
]);
Sparepart::create([
    'id' => 345,
    'nama_sparepart' => 'baut ukuran 10',
]);
Sparepart::create([
    'id' => 236,
    'nama_sparepart' => 'laker',
]);


        Maintenance::find(1)->sparepart()->attach(1);
        Maintenance::find(1)->sparepart()->attach(345);
        Maintenance::find(2)->sparepart()->attach(3);
        Maintenance::find(2)->sparepart()->attach(236);
        Maintenance::find(3)->sparepart()->attach([1,3]);

        


    }
}
