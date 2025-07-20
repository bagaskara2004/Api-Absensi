<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Eloquent\SoftDeletes;

class Absensi extends Model
{
    protected $table = 'absensi';
    use SoftDeletes;

    protected $fillable = [
        'nip',
        'tanggal_absensi',
        'jam_masuk',
        'jam_pulang',
        'status',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_absensi' => 'date',
        'jam_masuk' => 'datetime',
        'jam_pulang' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    const STATUS_ENUM = ['hadir', 'izin', 'sakit', 'alpha'];
}
