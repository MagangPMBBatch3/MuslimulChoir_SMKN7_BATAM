<?php

namespace App\GraphQL\Level\Mutations;
use App\Models\Level\Level;

class LevelMutation {
    public function restore($_, array $args) {
        $Level = Level::withTrashed()->findOrFail($args['id']);
        $Level->restore();
        return $Level;
    }

    public function forceDelete($_, array $args) {
        $Level = Level::withTrashed()->findOrFail($args['id']);
        $Level->forceDelete();
        return $Level;
    }
}
