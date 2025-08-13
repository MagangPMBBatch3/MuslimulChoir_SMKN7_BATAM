<?php

namespace App\GraphQL\User\Mutations;

use App\Models\User\User;

class UserMutation
{
    public function restore($_, array $args): ?User
    {
        return User::withTrashed()->find($args['id'])?->restore()
            ? User::withTrashed()->find($args['id'])
            : null;
    }

    public function forceDelete($_, array $args): ?User
    {
        $user = User::withTrashed()->find($args['id']);
        if ($user) {
            $user->forceDelete();
            return $user;
        }
        return null;
    }
}