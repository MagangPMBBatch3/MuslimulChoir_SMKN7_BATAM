<?php

namespace App\GraphQL\Keterangan\Queries;

use App\Models\Keterangan\Keterangan;

class KeteranganQuery
{
   public function allArsip($_, array $args)
   {
       return Keterangan::onlyTrashed()->get();
   }
}