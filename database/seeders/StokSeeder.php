<?php

namespace Database\Seeders;

use App\Models\Stok;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kue = new Stok;
        $data = [
            'nama_kue' => 'Bolu Enong',
            'stok_kue' => '100',
            'jenis_kue'  => 'Kering',
            'gambar_kue' => 'IMG/luffy 5 gear.jpg',
        ];

        $kue->create('stoks', $data);
    }
}
