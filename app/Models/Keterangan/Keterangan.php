<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keterangan extends Model
{
    use SoftDeletes;

    protected $table = 'keterangan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'bagian_id',
        'proyek_id',
        'tanggal',
    ];

    // Relasi ke Bagian
    public function bagian()
    {
        return $this->belongsTo(\App\Models\Bagian\Bagians::class , 'bagian_id');
    }

    // Relasi ke Proyek
    public function proyek()
    {
        return $this->belongsTo(\App\Models\Proyek\Proyek::class , 'proyek_id');
    }
}
