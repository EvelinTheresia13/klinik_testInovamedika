<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Pegawai 1',
                'username' => 'pegawai',
                'email' => 'pegawai1@gmail.com',
                'password' => bcrypt('pegawai123'),
                'role' => 'pegawai',  
            ],
            [
                'name' => 'Dokter 1',
                'username' => 'dokter',
                'email' => 'dokter1@gmail.com',
                'password' => bcrypt('dokter123'),
                'role' => 'dokter',     
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);   
        }
    }
}
