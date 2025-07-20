<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class PermintaanCutiResource extends JsonResource
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
            'jenis' => $this->jenis,
            'tanggal_mulai' => Carbon::parse($this->tanggal_mulai)->format('Y-m-d'),
            'tanggal_selesai' => Carbon::parse($this->tanggal_selesai)->format('Y-m-d'),
            'alasan' => $this->alasan,
            'status' => $this->status,
        ];
    }
}
