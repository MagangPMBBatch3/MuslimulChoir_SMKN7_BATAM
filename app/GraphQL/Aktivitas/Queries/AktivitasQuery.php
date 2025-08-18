<?php

namespace App\GraphQL\Aktivitas\Queries;

use App\Models\Aktivitas\Aktivitas;

class AktivitasQuery
{
    public function getAktivitas($_, array $args)
    {
        $query = Aktivitas::query();

        if (!empty($args['search'])) {
            $searchTerm = $args['search'];

            $query->where(function ($query) use ($searchTerm) {
                $query->where('id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('no_wbs', 'like', '%' . $searchTerm . '%')
                    ->orWhere('nama', 'like', '%' . $searchTerm . '%')
                    ->orWhereHas('bagian', function ($bagian) use ($searchTerm) {
                        $bagian->where('nama', 'like', '%' . $searchTerm . '%');
                    });
            });
        }

        return $query->with('bagian')->get();
    }

    public function allArsip($_, array $args)
    {
        return Aktivitas::onlyTrashed()->get();
    }
}