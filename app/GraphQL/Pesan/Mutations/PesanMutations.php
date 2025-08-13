<?php

namespace App\GraphQL\Pesan\Mutations;
use App\Models\Pesan\Pesan;

class PesanMutation {
    public function restore($_, array $args) {
        $Pesan = Pesan::withTrashed()->findOrFail($args['id']);
        $Pesan->restore();
        return $Pesan;
    }

    public function forceDelete($_, array $args) {
        $Pesan = Pesan::withTrashed()->findOrFail($args['id']);
        $Pesan->forceDelete();
        return $Pesan;
    }
}
