<?php

namespace App\GraphQL\ModeJamKerja\Mutations;
use App\Models\ModeJamKerja\ModeJamKerja;

class ModeJamKerjaMutation {
    public function restore($_, array $args) {
        $ModeJamKerja = ModeJamKerja::withTrashed()->findOrFail($args['id']);
        $ModeJamKerja->restore();
        return $ModeJamKerja;
    }

    public function forceDelete($_, array $args) {
        $ModeJamKerja = ModeJamKerja::withTrashed()->findOrFail($args['id']);
        $ModeJamKerja->forceDelete();
        return $ModeJamKerja;
    }
}
