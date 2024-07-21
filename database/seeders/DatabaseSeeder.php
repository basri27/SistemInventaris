<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Invent;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call([
        //     UserSeeder::class
        // ]);

        User::create([
            'name' => 'Test Staff Lab',
            'email' => 'stafflab@example.com',
            'password' => Hash::make('123123'),
            'role' => 'staff lab'
        ]);

        User::create([
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123123'),
            'role' => 'admin'
        ]);

        $kelompok = ['Peralatan Kantor', 'Peralatan Inspeksi', 'Sampling & Preparasi', 'Laboratorium', 'Safety', 'Mesin & Peralatan', 'Kendaraan'];
        $code = ['1.01', '1.02', '1.03', '1.04', '2.01', '3.01', '3.02', '3.03', '3.04', '3.05', '4.01', '4.02', '5.01', '5.02', '6.01', '7.01'];
        $nama = [
            'Furniture', 'Komputer & Printer', 'Peralatan Elektronik Lainnya', 'Perabotan', 
            'Peralatan Inspeksi', 
            'Preparation', 'Sizing', 'Sampling', 'HGI', 'Sampling & Preparasi Lainnya', 
            'Peralatan Laboratorium', 'Timbangan', 
            'Alat Pemadam Kebakaran', 'Life Vest', 
            'Mesin & Peralatan', 
            'Kendaraan'
        ];

        for($i = 0; $i <= 15; $i++) {
            if($i <= 3) {
                Category::create([
                    'kelompok' => $kelompok[0],
                    'cat_code' => $code[$i],
                    'cat_name' => $nama[$i]
                ]);
            } else if($i == 4) {
                Category::create([
                    'kelompok' => $kelompok[1],
                    'cat_code' => $code[$i],
                    'cat_name' => $nama[$i]
                ]);
            } else if($i > 4 && $i <= 9) {
                Category::create([
                    'kelompok' => $kelompok[2],
                    'cat_code' => $code[$i],
                    'cat_name' => 'Peralatan ' . $nama[$i]
                ]);
            } else if($i > 9 && $i <= 11) {
                Category::create([
                    'kelompok' => $kelompok[3],
                    'cat_code' => $code[$i],
                    'cat_name' => $nama[$i]
                ]);
            } else if($i > 11 && $i <= 13) {
                Category::create([
                    'kelompok' => $kelompok[4],
                    'cat_code' => $code[$i],
                    'cat_name' => $nama[$i]
                ]);
            } else if($i == 14) {
                Category::create([
                    'kelompok' => $kelompok[5],
                    'cat_code' => $code[$i],
                    'cat_name' => $nama[$i]
                ]);
            } else if($i == 15) {
                Category::create([
                    'kelompok' => $kelompok[6],
                    'cat_code' => $code[$i],
                    'cat_name' => $nama[$i]
                ]);
            }
        }


    }
}
