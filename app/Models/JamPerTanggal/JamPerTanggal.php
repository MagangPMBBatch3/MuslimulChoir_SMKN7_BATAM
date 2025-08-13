<?php

namespace App\Models\JamPerTanggal;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JamPerTanggal extends Model
{
    use SoftDeletes;

    protected $table = 'jam_per_tanggal';
    protected $primaryKey = 'id';

    protected $fillable = [
        'users_profile_id',
        'proyek_id',
        'tanggal',
        'jam',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    // Relasi ke UserProfile
    public function userProfile()
    {
        return $this->belongsTo(\App\Models\UserProfile\UserProfile::class);
    }
    // Relasi ke Proyek
    public function proyek()
    {
        return $this->belongsTo(\App\Models\Proyek\Proyek::class);
    }
}
