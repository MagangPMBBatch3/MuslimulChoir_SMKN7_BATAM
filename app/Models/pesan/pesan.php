<?php

namespace App\Models\Pesan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pesan extends Model
{
    use SoftDeletes;

    protected $table = 'pesan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'pengirim',
        'penerima',
        'isi',
        'parent_id',
        'tgl_pesan',
        'jenis_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // Relasi ke JenisPesan
    public function jenisPesan()
    {
        return $this->belongsTo(\App\Models\JenisPesanan\JenisPesanan::class, 'jenis_id');
    }
}
