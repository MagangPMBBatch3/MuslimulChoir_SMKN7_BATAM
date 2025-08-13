<?php

namespace App\GraphQL\Aktivitas\Mutations;
use App\Models\Aktivitas\Aktivitas;

class AktivitasMutation {
    public function restore($_, array $args) {
        $aktivitas = Aktivitas::withTrashed()->findOrFail($args['id']);
        $aktivitas->restore();
        return $aktivitas;
    }

    public function forceDelete($_, array $args) {
        $aktivitas = Aktivitas::withTrashed()->findOrFail($args['id']);
        $aktivitas->forceDelete();
        return $aktivitas;
    }
}
