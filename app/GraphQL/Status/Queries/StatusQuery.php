<?php

namespace App\GraphQL\Status\Queries;

use App\Models\Status\Statuses;

class StatusQuery
{
   public function allArsip($_, array $args)
   {
       return Statuses::onlyTrashed()->get();
   }
}