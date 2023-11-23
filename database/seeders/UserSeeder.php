<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'username' => 'teknisi',
            'nama' => 'Budak Korporat',
            'level' => 'Teknisi',
            'password' => bcrypt('1234'),
            'last_login' => Carbon::parse('12-05-2023 23:34:45'),
        ]);

        User::create([
            'username' => 'supervisor',
            'nama' => 'Supervisor',
            'level' => 'Supervisor',
            'password' => bcrypt('1234'),
            'last_login' => Carbon::parse('12-05-2023 23:34:45'),
        ]);
        User::create([
            'username' => 'manager',
            'nama' => 'Si paling manager',
            'level' => 'Manager',
            'password' => bcrypt('1234'),
            'last_login' => Carbon::parse('12-05-2023 23:34:45'),
        ]);
        User::create([
            'username' => 'admin',
            'nama' => 'Si Paling Admin',
            'level' => 'Admin',
            'password' => bcrypt('1234'),
            'last_login' => Carbon::parse('12-05-2023 23:34:45'),
        ]);
        User::create([
            'username' => 'superuser',
            'nama' => 'Akulah Arjuna',
            'level' => 'Superuser',
            'password' => bcrypt('1234'),
        ]);




        User::create([
            'username' => 'dewa',
            'nama' => 'Si Paling Sangar',
            'level' => 'Superuser',
            'password' => bcrypt('1234'),
        ]);
        
            User::create([
                'username' => 'fadhilah',
                'nama' => 'Fadhilah Alya',
                'level' => 'Teknisi',
                'password' => bcrypt('1234'),
                'last_login' => Carbon::parse('12-05-2023 23:34:45'),
            ]);
        
            User::create([
                'username' => 'aqiff',
                'nama' => 'Tsaqif Abdan',
                'level' => 'Supervisor',
                'password' => bcrypt('6969'),
                'last_login' => Carbon::parse('12-09-2023 09:56:45'),
            ]);
        
            User::create([
                'username' => 'elfael',
                'nama' => 'Faelasuf Nabil Antono',
                'level' => 'Manager',
                'password' => bcrypt('4567'),
                'last_login' => Carbon::parse('12-09-2023 18:45:05'),
            ]);
    }
}
