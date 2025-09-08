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
        'pengirim_id',
        'penerima_id',
        'isi',
        'tgl_pesan',
        'jenis_id',
    ];

    protected $casts = [
        'tgl_pesan' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // Relasi ke JenisPesan
    public function jenis_pesan()
    {
       return $this->belongsTo(\App\Models\JenisPesan\JenisPesan::class , 'jenis_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class ,'pengirim_id', 'id');
    }

    public function penerima()
    {
        return $this->belongsTo(\App\Models\User::class, 'penerima_id', 'id');
    }

}
