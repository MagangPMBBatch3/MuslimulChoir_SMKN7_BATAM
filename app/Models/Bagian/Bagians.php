<?php

namespace App\Models\Bagian;

use Illuminate\Database\Eloquent\Model;

class Bagians extends Model
{
   protected $table = 'bagian';

   protected $primaryKey = 'id';

   protected $fillable =['nama'];

   protected $casts = [
       'created_at' => 'datetime',
       'updated_at' => 'datetime',
   ];
   
   public $timestamps = true;

}