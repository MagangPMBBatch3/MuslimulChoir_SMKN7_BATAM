<?php

namespace App\GraphQL\Keterangan\Mutations;
use App\Models\Keterangan\Keterangan;

class KeteranganMutation {
    public function restore($_, array $args) {
        $keterangan = Keterangan::withTrashed()->findOrFail($args['id']);
        $keterangan->restore();
        return $keterangan;
    }

    public function forceDelete($_, array $args) {
        $keterangan = Keterangan::withTrashed()->findOrFail($args['id']);
        $keterangan->forceDelete();
        return $keterangan;
    }
}
