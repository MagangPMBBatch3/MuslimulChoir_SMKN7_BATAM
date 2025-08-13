<?php

namespace App\Models\Level;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    use SoftDeletes;
    protected $table = 'levels';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
}