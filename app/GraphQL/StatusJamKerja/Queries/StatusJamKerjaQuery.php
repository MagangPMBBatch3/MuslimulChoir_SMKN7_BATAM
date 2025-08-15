<?php

namespace App\GraphQL\StatusJamKerja\Queries;

use App\Models\StatusJamKerja\StatusJamKerja;

class StatusJamKerjaQuery
{
   public function allArsip($_, array $args)
   {
       return StatusJamKerja::onlyTrashed()->get();
   }
}