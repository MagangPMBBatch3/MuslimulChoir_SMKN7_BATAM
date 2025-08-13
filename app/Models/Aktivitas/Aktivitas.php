<?php

namespace App\Models\Aktivitas;

use App\Models\Bagian\Bagians;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aktivitas extends Model
{
    use SoftDeletes;

    protected $table = 'aktivitas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'bagian_id',
        'no_wbs',
        'nama',
    ];

    // Relasi ke Bagian
    public function bagian()
    {
        return $this->belongsTo(\App\Models\Bagian\Bagians::class, 'bagian_id');
    }
}
