<?php

namespace App\Models\JenisPesanan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisPesanan extends Model
{
   use SoftDeletes;

    protected $table = 'jenis_pesanan';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
}
