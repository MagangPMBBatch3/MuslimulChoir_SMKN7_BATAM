<?php

namespace App\GraphQL\StatusJamKerja\Mutations;
use App\Models\StatusJamKerja\StatusJamKerja;

class StatusJamKerjaMutation {
    public function restore($_, array $args) {
        $StatusJamKerja = StatusJamKerja::withTrashed()->findOrFail($args['id']);
        $StatusJamKerja->restore();
        return $StatusJamKerja;
    }

    public function forceDelete($_, array $args) {
        $StatusJamKerja = StatusJamKerja::withTrashed()->findOrFail($args['id']);
        $StatusJamKerja->forceDelete();
        return $StatusJamKerja;
    }
}
