<?php

namespace Database\Seeders;

use App\Models\Mesin;
use App\Models\Ruang;
use App\Models\Kategori;
use App\Models\Maintenance;
use App\Models\SetupForm;
use App\Models\SetupMaintenance;
use App\Models\Sparepart;
use App\Models\User;
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

        $this->call([
            KategoriSeeder::class,
            UserSeeder::class
        ]);


    }
}
