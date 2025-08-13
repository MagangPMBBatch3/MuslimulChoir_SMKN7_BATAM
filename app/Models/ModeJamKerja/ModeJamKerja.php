<?php

namespace App\Models\ModeJamKerja;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModeJamKerja extends Model
{
    use SoftDeletes;

    protected $table = 'mode_jam_kerja';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
    ];
}
