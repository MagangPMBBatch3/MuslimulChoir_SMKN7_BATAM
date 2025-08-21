<?php

namespace App\GraphQL\Pesan\Queries;

use App\Models\Pesan\Pesan;

class PesanQuery
{
    public function getPesans($_, array $args)
    {
        $query = Pesan::query();

        if (!empty($args['search'])) {
            $searchTerm = $args['search'];

            $query->where(function ($query) use ($searchTerm) {
                $query->where('id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('pengirim', 'like', '%' . $searchTerm . '%')
                    ->orWhere('penerima', 'like', '%' . $searchTerm . '%')
                    ->orWhere('isi', 'like', '%' . $searchTerm . '%')
                    ->orWhere('parent_id', 'like', '%' . $searchTerm . '%')
                    ->orWhere('tgl_pesan', 'like', '%' . $searchTerm . '%')
                    ->orWhereHas('jenis_pesan', function ($jenis_pesan) use ($searchTerm) {
                        $jenis_pesan->where('nama', 'like', '%' . $searchTerm . '%');
                    });
            });
        }

        return $query->with( 'jenis_pesan')->get();
    }

    public function allArsip($_, array $args)
    {
        return Pesan::onlyTrashed()->get();
    }
}