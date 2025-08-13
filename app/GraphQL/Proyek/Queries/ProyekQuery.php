<?php

namespace App\GraphQL\Proyek\Queries;

use App\Models\Proyek\Proyek;

class ProyekQuery{
    public function getProyeks($_, array $args){
        $query = Proyek::query();

        if (!empty($args['search'])) {
            $query->where('id', 'like', '%' . $args['search'] . '%')
                    ->orwhere('nama', 'like', '%' . $args['search'] . '%')
                    ->orwhere('kode', 'like', '%' . $args['search'] . '%')
                    ->orwhere('nama_sekolah', 'like', '%' . $args['search'] . '%');
        }
        return $query->get();
    }
}