<?php

namespace App\GraphQL\User\Queries;

use App\Models\User;

class UserQuery
{
   public function allArsip($_, array $args)
   {
       return User::onlyTrashed()->get();
   }
}