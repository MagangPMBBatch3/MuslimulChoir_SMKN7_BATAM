<?php

namespace App\GraphQL\JamKerja\Mutations;
use App\Models\JamKerja;

class JamKerjaMutation {
    public function restore($_, array $args) {
        $JamKerja = JamKerja::withTrashed()->findOrFail($args['id']);
        $JamKerja->restore();
        return $JamKerja;
    }

    public function forceDelete($_, array $args) {
        $JamKerja = JamKerja::withTrashed()->findOrFail($args['id']);
        $JamKerja->forceDelete();
        return $JamKerja;
    }
}
