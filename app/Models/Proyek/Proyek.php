<?php

namespace App\Models\Proyek;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyek extends Model
{
   use SoftDeletes;

    protected $table = 'proyek';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode',
        'nama',
        'tanggal',
        'nama_sekolah',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
}
