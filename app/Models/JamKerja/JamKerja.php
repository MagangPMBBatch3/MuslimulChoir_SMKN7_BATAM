<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JamKerja extends Model
{
    use SoftDeletes;

    protected $table = 'jam_kerja';
    protected $primaryKey = 'id';

    protected $fillable = [
        'users_profile_id',
        'no_wbs',
        'kode_proyek',
        'proyek_id',
        'aktivitas_id',
        'tanggal',
        'jumlah_jam',
        'keterangan',
        'status_id',
        'mode_id',
    ];

    // Relasi ke UserProfile
    public function userProfile()
    {
        return $this->belongsTo(\App\Models\UserProfile\UserProfile::class , 'users_profile_id');
    }

    // Relasi ke Proyek
    public function proyek()
    {
        return $this->belongsTo(\App\Models\Proyek\Proyek::class , 'proyek_id');
    }

    // Relasi ke Aktivitas
    public function aktivitas()
    {
        return $this->belongsTo(\App\Models\Aktivitas\Aktivitas::class , 'aktivitas_id');
    }

    // Relasi ke Status
    public function status()
    {
        return $this->belongsTo(\App\Models\Status\Statuses::class , 'status_id');
    }

    // Relasi ke ModeJamKerja
    public function modeJamKerja()
    {
        return $this->belongsTo(\App\Models\ModeJamKerja\ModeJamKerja::class , 'mode_id');
    }
}
