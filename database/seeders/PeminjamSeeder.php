<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeminjamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('peminjams')->insert([
            [
                'nim' => '120420012',
                'name' => 'rezja',
                'program_studi' => 'Sistem Informasi',
                'fakultas' => 'Bisnis',
                'email' => 'rezja@gmail.com',
                'password' => bcrypt('password'),
               
            ],
        ]);
    }
}
