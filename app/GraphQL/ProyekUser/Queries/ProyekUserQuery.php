<?php

namespace App\GraphQL\ProyekUser\Queries;

use App\Models\ProyekUser\ProyekUser;

class ProyekUserQuery
{
    public function getProyekUsers($_, array $args)
    {
        $query = ProyekUser::query();

        if (!empty($args['search'])) {
            $searchTerm = $args['search'];

            $query->where(function ($query) use ($searchTerm) {
                $query->where('id', 'like',   $searchTerm  )
                    ->orWhereHas('user_profile', function ($user_profile) use ($searchTerm) {
                        $user_profile->where('nama_lengkap', 'like', '%' . $searchTerm . '%');
                    })
                    ->orWhereHas('proyek', function ($proyek) use ($searchTerm) {
                        $proyek->where('nama', 'like', '%' . $searchTerm . '%');
                    });
            });
        }

        return $query->with('user_profile', 'proyek')->get();
    }

    public function allArsip($_, array $args)
    {
        return ProyekUser::onlyTrashed()->get();
    }
}