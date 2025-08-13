<?php

namespace App\Models;

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
    public function userProfile()
    {
        return $this->belongsTo(\App\Models\userProfile\UserProfile::class);
    }

    // Relasi ke Proyek
    public function proyek()
    {
        return $this->belongsTo(\App\Models\Proyek\Proyek::class);
    }
}
