<?php

namespace App\GraphQL\JenisPesan\Queries;

use App\Models\JenisPesan\JenisPesan;

class JenisPesanQuery
{
   public function allArsip($_, array $args)
   {
       return JenisPesan::onlyTrashed()->get();
   }
}