<?php

namespace App\GraphQL\JenisPesan\Mutations;
use App\Models\JenisPesan\JenisPesan;

class JenisPesanMutation {
    public function restore($_, array $args) {
        $JenisPesanan = JenisPesan::withTrashed()->findOrFail($args['id']);
        $JenisPesanan->restore();
        return $JenisPesanan;
    }

    public function forceDelete($_, array $args) {
        $JenisPesanan = JenisPesan::withTrashed()->findOrFail($args['id']);
        $JenisPesanan->forceDelete();
        return $JenisPesanan;
    }
}
