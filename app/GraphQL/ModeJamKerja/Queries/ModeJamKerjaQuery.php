<?php

namespace App\GraphQL\ModeJamKerja\Queries;

use App\Models\ModeJamKerja\ModeJamKerja;

class ModeJamKerjaQuery
{
   public function allArsip($_, array $args)
   {
       return ModeJamKerja::onlyTrashed()->get();
   }
}