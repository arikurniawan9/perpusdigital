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
                'nama_kategori'=>'Alat Elektronik',
            ],[
                'nama_kategori'=>'Makanan',
            ],[
                'nama_kategori'=>'Pakaian',
            ],[
                'nama_kategori'=>'Minuman',
            ],[
                'nama_kategori'=>'Sayuran',
            ],
        ];

        foreach($kategoriData as $key => $val)
        {
            Kategori::create($val);
        }
    }
}
