<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Permintaan_Cuti;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PermintaanCutiResource;

class PermintaanCutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PermintaanCutiResource::collection(Permintaan_Cuti::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required|string',
            'jenis' => ['required', Rule::in(['tahunan', 'lainnya', 'sakit', 'acara'])],
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'alasan' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::where('nip', $request->nip)->first();

        if (!$user) {
            return response()->json(['message' => 'User tidak ditemukan'], 409);
        }

        $cuti = Permintaan_Cuti::create([
            'nip' => $request->nip,
            'jenis' => $request->jenis,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'alasan' => $request->alasan,
            'status' => 'menunggu',
        ]);

        return new PermintaanCutiResource($cuti);
    }

    /**
     * Display the specified resource.
     */
    public function show(Permintaan_Cuti $permintaan_cuti)
    {
        return new PermintaanCutiResource($permintaan_cuti);
    }

    public function getCutiPegawai($nip)
    {
        return PermintaanCutiResource::collection(Permintaan_Cuti::where('nip', $nip)->get());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permintaan_Cuti $permintaan_Cuti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permintaan_Cuti $permintaan_cuti)
    {
        $permintaan_cuti->delete();
        return new PermintaanCutiResource($permintaan_cuti);
    }

    public function disetujui(Permintaan_Cuti $permintaan_cuti)
    {
        if ($permintaan_cuti->status != 'menunggu') {
            return response()->json(['message' => 'Permintaan Cuti sudah ' . $permintaan_cuti->status], 409);
        }
        $permintaan_cuti->status = 'disetujui';
        $permintaan_cuti->save();
        return new PermintaanCutiResource($permintaan_cuti);
    }

    public function ditolak(Permintaan_Cuti $permintaan_cuti)
    {
        if ($permintaan_cuti->status != 'menunggu') {
            return response()->json(['message' => 'Permintaan Cuti sudah ' . $permintaan_cuti->status], 409);
        }
        $permintaan_cuti->status = 'ditolak';
        $permintaan_cuti->save();
        return new PermintaanCutiResource($permintaan_cuti);
    }
}
