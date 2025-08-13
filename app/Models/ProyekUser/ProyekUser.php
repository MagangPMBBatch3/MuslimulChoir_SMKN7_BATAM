<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProyekUser extends Model
{
    use SoftDeletes;

    protected $table = 'proyek_user';
    protected $primaryKey = 'id';

    protected $fillable = [
        'proyek_id',
        'users_profile_id',
    ];

    // Relasi ke Proyek
    public function proyek()
    {
        return $this->belongsTo(\App\Models\Proyek\Proyek::class);
    }

    // Relasi ke UserProfile
    public function userProfile()
    {
        return $this->belongsTo(\App\Models\UserProfile\UserProfile::class);
    }
}
