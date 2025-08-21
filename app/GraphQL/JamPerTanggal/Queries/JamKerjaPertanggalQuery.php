<?php

namespace App\GraphQL\JamPerTanggal\Queries;

use App\Models\JamPerTanggal\JamPerTanggal;

class JamPerTanggalQuery
{
    public function getJamPerTanggals($_, array $args)
    {
        $query = JamPerTanggal::query();

        if (!empty($args['search'])) {
            $searchTerm = $args['search'];

            $query->where(function ($query) use ($searchTerm) {
                $query->where('id', 'like', '%' .  $searchTerm . '%')
                    ->orWhere('tanggal', 'like', '%' .  $searchTerm . '%')
                    ->orWhereHas('userProfile', function ($userProfile) use ($searchTerm) {
                        $userProfile->where('nama_lengkap', 'like', '%' .  $searchTerm . '%');
                    })
                    ->orWhereHas('proyek', function ($proyek) use ($searchTerm) {
                        $proyek->where('nama', 'like', '%' .  $searchTerm . '%');
                    });
            });
        }

        return $query->with('userProfile', 'proyek')->get();
    }

    public function allArsip($_, array $args)
    {
        return JamPerTanggal::onlyTrashed()->get();
    }
}