<?php

namespace App\GraphQL\UserProfile\Mutations;

use App\Models\UserProfile\UserProfile;

class UserProfileMutation
{
    public function restore($_, array $args): ?UserProfile
    {
        return UserProfile::withTrashed()->find($args['id'])?->restore()
            ? UserProfile::find($args['id'])
            : null;
    }

    public function forceDelete($_, array $args): ?UserProfile
    {
        $userProfile = UserProfile::withTrashed()->find($args['id']);
        if ($userProfile) {
            $userProfile->forceDelete();
            return $userProfile;
        }
        return null;
    }
}