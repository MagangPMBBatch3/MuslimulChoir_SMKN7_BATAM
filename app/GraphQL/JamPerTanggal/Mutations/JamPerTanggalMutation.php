<?php

namespace App\GraphQL\JamPerTanggal\Mutations;
use App\Models\JamPerTanggal\JamPerTanggal;

class JamPerTanggalMutation {
    public function restore($_, array $args) {
        $JamPerTanggal = JamPerTanggal::withTrashed()->findOrFail($args['id']);
        $JamPerTanggal->restore();
        return $JamPerTanggal;
    }

    public function forceDelete($_, array $args) {
        $JamPerTanggal = JamPerTanggal::withTrashed()->findOrFail($args['id']);
        $JamPerTanggal->forceDelete();
        return $JamPerTanggal;
    }
}
