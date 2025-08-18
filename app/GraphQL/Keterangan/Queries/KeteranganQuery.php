<?php

namespace App\GraphQL\Keterangan\Queries;

use App\Models\Keterangan\Keterangan;

class KeteranganQuery
{
    public function getKeterangans($_, array $args)
    {
        $query = Keterangan::query();

        if (!empty($args['search'])) {
            $searchTerm = $args['search'];

            $query->where(function ($query) use ($searchTerm) {
                $query->where('id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('tanggal', 'like', '%' . $searchTerm . '%')
                    ->orWhereHas('bagian', function ($bagian) use ($searchTerm) {
                        $bagian->where('nama', 'like', '%' . $searchTerm . '%');
                    })
                    ->orWhereHas('proyek', function ($proyek) use ($searchTerm) {
                        $proyek->where('nama', 'like', '%' . $searchTerm . '%');
                    });
            });
        }

        return $query->with('bagian', 'proyek')->get();
    }

    public function allArsip($_, array $args)
    {
        return Keterangan::onlyTrashed()->get();
    }
}