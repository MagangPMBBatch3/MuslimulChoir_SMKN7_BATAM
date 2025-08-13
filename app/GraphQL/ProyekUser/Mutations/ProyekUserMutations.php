<?php

namespace App\GraphQL\ProyekUser\Mutations;
use App\Models\ProyekUser;

class ProyekUserMutation {
    public function restore($_, array $args) {
        $ProyekUser = ProyekUser::withTrashed()->findOrFail($args['id']);
        $ProyekUser->restore();
        return $ProyekUser;
    }

    public function forceDelete($_, array $args) {
        $ProyekUser = ProyekUser::withTrashed()->findOrFail($args['id']);
        $ProyekUser->forceDelete();
        return $ProyekUser;
    }
}
