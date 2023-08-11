<?php

namespace Database\Seeders;

use App\Models\Mesin;
use App\Models\Pekerjaan;
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


    }
}
