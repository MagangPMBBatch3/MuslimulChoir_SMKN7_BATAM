<?php

namespace App\GraphQL\Lembur\Mutations;
use App\Models\Lembur\Lembur;

class LemburMutation {
    public function restore($_, array $args) {
        $lembur = Lembur::withTrashed()->findOrFail($args['id']);
        $lembur->restore();
        return $lembur;
    }

    public function forceDelete($_, array $args) {
        $lembur = Lembur::withTrashed()->findOrFail($args['id']);
        $lembur->forceDelete();
        return $lembur;
    }
}
