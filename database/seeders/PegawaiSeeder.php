<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pegawais')->insert([
            [
                'nip' => '120420010',
                'name' => 'zalva',
                'usia' => '22',
                'status_kedudukan' => 'Kepala',
                'email' => 'zalva@gmail.com',
                'password' => bcrypt('password'),
                
            ],
        ]);
    }
}
