<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class SandalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('produk')->insert([
        'nama_sandal' => 'Carvil',
        'gambar' => 'gambar.png',
        'ukuran' => 36,
        'deskripsi' => 'Bagus dan Elegan',
        'harga' => 'Rp 34.000',
        'stok' => 34
        ]);
    }
}
