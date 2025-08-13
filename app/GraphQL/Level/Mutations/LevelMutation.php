<?php

namespace App\GraphQL\Level\Mutations;
use App\Models\Level\Level;

class LevelMutation {
    public function restore($_, array $args) {
        $level = Level::withTrashed()->findOrFail($args['id']);
        $level->restore();
        return $level;
    }

    public function forceDelete($_, array $args) {
        $level = Level::withTrashed()->findOrFail($args['id']);
        $level->forceDelete();
        return $level;
    }
}
