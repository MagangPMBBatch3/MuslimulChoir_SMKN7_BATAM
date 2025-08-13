<?php

namespace App\GraphQL\JenisPesanan\Mutations;
use App\Models\JenisPesanan\JenisPesanan;

class JenisPesananMutation {
    public function restore($_, array $args) {
        $JenisPesanan = JenisPesanan::withTrashed()->findOrFail($args['id']);
        $JenisPesanan->restore();
        return $JenisPesanan;
    }

    public function forceDelete($_, array $args) {
        $JenisPesanan = JenisPesanan::withTrashed()->findOrFail($args['id']);
        $JenisPesanan->forceDelete();
        return $JenisPesanan;
    }
}
