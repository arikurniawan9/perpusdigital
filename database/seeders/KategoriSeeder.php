<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoriData = [
            [
                'nama_kategori'=>'Agama',
            ],[
                'nama_kategori'=>'Biologi',
            ],[
                'nama_kategori'=>'Bisnis',
            ],[
                'nama_kategori'=>'Teknologi',
            ],
        ];

        foreach($kategoriData as $key => $val)
        {
            Kategori::create($val);
        }
    }
}
