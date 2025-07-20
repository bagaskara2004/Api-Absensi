<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;

class Permintaan_Cuti extends Model
{
    protected $table = 'permintaan_cuti';
    use SoftDeletes;

    protected $fillable = [
        'nip',
        'jenis',
        'tanggal_mulai',
        'tanggal_selesai',
        'alasan',
        'status',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    const JENIS_ENUM = ['tahunan', 'lainnya', 'sakit', 'acara'];
    const STATUS_ENUM = ['menunggu', 'disetujui', 'ditolak'];
}
