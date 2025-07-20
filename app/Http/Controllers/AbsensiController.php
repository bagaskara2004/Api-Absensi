<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use App\Http\Resources\AbsensiResource;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AbsensiResource::collection(Absensi::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required|string',
            'status' => ['required', Rule::in(['hadir', 'izin', 'sakit', 'alpha'])],
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::where('nip',$request->nip)->first();

        if (!$user) {
            return response()->json(['message' => 'User tidak ditemukan'], 409);
        }

        $sudahAbsen = Absensi::where('nip', $request->nip)
            ->where('tanggal_absensi', Carbon::today())
            ->exists();

        if ($sudahAbsen) {
            return response()->json(['message' => 'Sudah absen hari ini.'], 409);
        }

        $absen = Absensi::create([
            'nip' => $request->nip,
            'tanggal_absensi' => Carbon::today(),
            'jam_masuk' => now(),
            'status' => $request->status,
            'keterangan' => $request->keterangan
        ]);

        return new AbsensiResource($absen);
    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        return new AbsensiResource($absensi);
    }

    public function getAbsensiPegawai($nip)
    {
        return AbsensiResource::collection(Absensi::where('nip', $nip)->get());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Absensi $absensi)
    {
        if ($absensi->jam_pulang) {
            return response()->json(['message' => 'Sudah absen pulang hari ini.'], 409);
        }
        $absensi->jam_pulang = Carbon::now();
        $absensi->save();
        return new AbsensiResource($absensi);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
        return new AbsensiResource($absensi);
    }
}
