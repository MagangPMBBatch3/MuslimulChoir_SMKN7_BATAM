<?php

namespace App\Models\Status;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Statuses extends Model
{
     use SoftDeletes;
   protected $table = 'statuses';
   protected $primaryKey = 'id';

   protected $fillable = ['name'];

   protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
}
