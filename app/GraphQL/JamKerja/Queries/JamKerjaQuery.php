<?php

namespace App\GraphQL\JamKerja\Queries;

use App\Models\JamKerja\JamKerja;

class JamKerjaQuery
{
    public function getJamKerjas($_, array $args)
    {
        $query = JamKerja::query();

        if (!empty($args['search'])) {
            $searchTerm = $args['search'];

            $query->where(function ($query) use ($searchTerm) {
                $query->where('id', 'like', '%' .  $searchTerm . '%')
                    ->orWhere('no_wbs', 'like', '%' .  $searchTerm . '%')
                    ->orWhere('kode_proyek', 'like', '%' .  $searchTerm . '%')
                    ->orWhere('tanggal', 'like', '%' .  $searchTerm . '%')
                    ->orWhere('jumlah_jam', 'like', '%' .  $searchTerm . '%')
                    ->orWhere('keterangan', 'like', '%' .  $searchTerm . '%')
                    ->orWhereHas('userProfile', function ($userProfile) use ($searchTerm) {
                        $userProfile->where('nama_lengkap', 'like', '%' .  $searchTerm . '%');
                    })
                    ->orWhereHas('proyek', function ($proyek) use ($searchTerm) {
                        $proyek->where('nama', 'like', '%' .  $searchTerm . '%');
                    })
                    ->orWhereHas('aktivitas', function ($aktivitas) use ($searchTerm) {
                        $aktivitas->where('nama', 'like', '%' .  $searchTerm . '%');
                    })
                    ->orWhereHas('status', function ($status) use ($searchTerm) {
                        $status->where('nama', 'like', '%' .  $searchTerm . '%');
                    })
                    ->orWhereHas('modeJamKerja', function ($modeJamKerja) use ($searchTerm) {
                        $modeJamKerja->where('nama', 'like', '%' .  $searchTerm . '%');
                    });
            });
        }

        return $query->with('userProfile', 'proyek', 'aktivitas', 'status', 'modeJamKerja')->get();
    }

    public function allArsip($_, array $args)
    {
        return JamKerja::onlyTrashed()->get();
    }
}