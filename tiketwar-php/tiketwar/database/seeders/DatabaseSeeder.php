<?php

namespace Database\Seeders;

use App\Models\Konser;
use App\Models\Promotor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $global = Promotor::firstOrCreate(['nama' => 'Global Music']);
        $nusantara = Promotor::firstOrCreate(['nama' => 'Nusantara Live']);
        $harmoni = Promotor::firstOrCreate(['nama' => 'Harmoni Musik']);

        $konser = [
            [
                'promotor_id' => $global->id,
                'nama' => 'Coldplay - Music of the Spheres',
                'kota' => 'Jakarta',
                'harga' => 1500000,
                'sisa' => 100,
                'tanggal' => '2027-01-10',
            ],
            [
                'promotor_id' => $global->id,
                'nama' => 'NCT Dream',
                'kota' => 'Jakarta',
                'harga' => 1250000,
                'sisa' => 80,
                'tanggal' => '2027-01-15',
            ],
            [
                'promotor_id' => $nusantara->id,
                'nama' => 'Dewa 19 - Pesta Rakyat',
                'kota' => 'Surabaya',
                'harga' => 450000,
                'sisa' => 50,
                'tanggal' => '2027-01-20',
            ],
            [
                'promotor_id' => $nusantara->id,
                'nama' => 'Festival Musik Pantai',
                'kota' => 'Bali',
                'harga' => 600000,
                'sisa' => 8,
                'tanggal' => '2027-01-25',
            ],
            [
                'promotor_id' => $harmoni->id,
                'nama' => 'Malam Akustik Kota',
                'kota' => 'Bandung',
                'harga' => 250000,
                'sisa' => 60,
                'tanggal' => '2027-01-30',
            ],
        ];

        foreach ($konser as $data) {
            Konser::firstOrCreate(['nama' => $data['nama']], $data);
        }
    }
}