<?php

namespace Database\Seeders;

use App\Models\Konser;
use App\Models\Pesanan;
use Illuminate\Database\Seeder;

class PesananSeeder extends Seeder
{
    public function run(): void
    {
        $coldplay = Konser::where('nama', 'Coldplay - Music of the Spheres')->firstOrFail();
        $dewa = Konser::where('nama', 'Dewa 19 - Pesta Rakyat')->firstOrFail();
        $pantai = Konser::where('nama', 'Festival Musik Pantai')->firstOrFail();
        $akustik = Konser::where('nama', 'Malam Akustik Kota')->firstOrFail();

        $this->buat($coldplay, 'Budi Santoso', 'budi@mail.test', 2, Pesanan::LUNAS, 6);
        $this->buat($dewa, 'Rina Wijaya', 'rina@mail.test', 4, Pesanan::LUNAS, 5);
        $this->buat($pantai, 'Agus Pratama', 'agus@mail.test', 2, Pesanan::BATAL, 4);
        $this->buat($coldplay, 'Siti Aminah', 'siti@mail.test', 1, Pesanan::MENUNGGU_BAYAR, 3);
        $this->buat($akustik, 'Dewi Lestari', 'dewi@mail.test', 3, Pesanan::LUNAS, 2);
        $this->buat($dewa, 'Hendra Gunawan', 'hendra@mail.test', 2, Pesanan::MENUNGGU_BAYAR, 1);
    }

    private function buat(
        Konser $konser,
        string $nama,
        string $email,
        int $jumlah,
        string $status,
        int $hariLalu
    ): void {
        $pesanan = Pesanan::firstOrNew([
            'konser_id' => $konser->id,
            'email' => $email,
        ]);

        if ($pesanan->exists) {
            return;
        }

        $pesanan->nama_pemesan = $nama;
        $pesanan->jumlah = $jumlah;
        $pesanan->harga_satuan = $konser->harga;
        $pesanan->total = $konser->harga * $jumlah;
        $pesanan->status = $status;
        $pesanan->created_at = now()->subDays($hariLalu);
        $pesanan->save();

        if ($status !== Pesanan::BATAL) {
            $konser->decrement('sisa', $jumlah);
        }
    }
}