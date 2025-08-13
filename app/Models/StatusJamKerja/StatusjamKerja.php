<?php

namespace App\Models\StatusJamKerja;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusjamKerja extends Model
{
   use SoftDeletes;

    protected $table = 'status_jam_kerja';
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
