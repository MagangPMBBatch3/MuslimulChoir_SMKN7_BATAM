<?php

namespace App\GraphQL\UserProfile\Queries;

use App\Models\UserProfile\UserProfile;

class UserProfileQuery
{
    public function getUserProfiles($_, array $args)
    {
        $query = UserProfile::query();

        if (!empty($args['search'])) {
            $searchTerm = $args['search'];

            $query->where(function ($query) use ($searchTerm) {
                $query->where('id', 'like', $searchTerm . '%')
                    ->orWhere('nama_lengkap', 'like', $searchTerm . '%')
                    ->orWhere('nrp', 'like', $searchTerm . '%')
                    ->orWhere('alamat', 'like', $searchTerm . '%')
                    ->orWhere('foto', 'like', $searchTerm . '%')
                    ->orWhereHas('user', function ($user) use ($searchTerm) {
                        $user->where('email', 'like', $searchTerm . '%');
                    })
                    ->orWhereHas('level', function ($level) use ($searchTerm) {
                        $level->where('nama', 'like', $searchTerm . '%');
                    })
                    ->orWhereHas('bagian', function ($bagian) use ($searchTerm) {
                        $bagian->where('nama', 'like', $searchTerm . '%');
                    })
                    ->orWhereHas('status', function ($status) use ($searchTerm) {
                        $status->where('nama', 'like', $searchTerm . '%');
                    });
            });
        }

        return $query->with('bagian', 'user', 'level', 'status')->get();
    }

    public function allArsip($_, array $args)
    {
        return UserProfile::onlyTrashed()->get();
    }
}