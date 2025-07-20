<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class AbsensiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nip' => $this->nip,
            'tanggal_absensi' => Carbon::parse($this->tanggal_absensi)->format('Y-m-d'),
            'jam_masuk' => $this->jam_masuk?Carbon::parse($this->jam_masuk)->format('Y-m-d H:i:s'):null,
            'jam_pulang' => $this->jam_pulang?Carbon::parse($this->jam_pulang)->format('Y-m-d H:i:s'):null,
            'status' => $this->status,
            'keterangan' => $this->keterangan,
        ];
    }
}
