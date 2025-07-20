<?php

namespace Database\Seeders;

use App\Models\Permintaan_Cuti;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermintaanCutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permintaan_Cuti::create([
            'nip' => 'PG1',
            'jenis' => 'sakit',
            'tanggal_mulai' => '2025-07-20',
            'tanggal_selesai' => '2025-07-30',
            'alasan' => 'demam berdarah',
            'status' => 'menunggu',
        ]);

        Permintaan_Cuti::create([
            'nip' => 'PG2',
            'jenis' => 'tahunan',
            'tanggal_mulai' => '2025-07-20',
            'tanggal_selesai' => '2025-07-25',
            'alasan' => 'liburan keluarga',
            'status' => 'menunggu',
        ]);

        Permintaan_Cuti::create([
            'nip' => 'PG3',
            'jenis' => 'sakit',
            'tanggal_mulai' => '2025-07-15',
            'tanggal_selesai' => '2025-07-18',
            'alasan' => 'panas dingin',
            'status' => 'disetujui',
        ]);

        Permintaan_Cuti::create([
            'nip' => 'PG4',
            'jenis' => 'acara',
            'tanggal_mulai' => '2025-08-10',
            'tanggal_selesai' => '2025-08-15',
            'alasan' => 'acara keluarga',
            'status' => 'ditolak',
        ]);
    }
}
