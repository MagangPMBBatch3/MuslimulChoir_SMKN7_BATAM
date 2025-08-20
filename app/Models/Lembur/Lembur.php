<?php

namespace App\Models\Lembur;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lembur extends Model
{
    use SoftDeletes;

    protected $table = 'lembur';
    protected $primaryKey = 'id';

    protected $fillable = [
        'users_profile_id',
        'proyek_id',
        'tanggal',
    ];

    // Relasi ke UserProfile
    public function user_profile()
    {
        return $this->belongsTo(\App\Models\userProfile\UserProfile::class , 'users_profile_id');
    }

    // Relasi ke Proyek
    public function proyek()
    {
        return $this->belongsTo(\App\Models\Proyek\Proyek::class , 'proyek_id');
    }
}
