<?php

namespace Database\Seeders;

use App\Models\Absensi;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Absensi::create([
            'nip' => 'PG1',
            'tanggal_absensi' => Carbon::today(),
            'jam_masuk' => Carbon::now(),
            'jam_pulang' => Carbon::now(),
            'status' => 'hadir',
        ]);

        Absensi::create([
            'nip' => 'PG2',
            'tanggal_absensi' => Carbon::today(),
            'jam_masuk' => Carbon::now(),
            'jam_pulang' => Carbon::now(),
            'status' => 'hadir',
        ]);

        Absensi::create([
            'nip' => 'PG3',
            'tanggal_absensi' => Carbon::today(),
            'jam_masuk' => Carbon::now(),
            'jam_pulang' => Carbon::now(),
            'status' => 'hadir',
        ]);
    }
}
