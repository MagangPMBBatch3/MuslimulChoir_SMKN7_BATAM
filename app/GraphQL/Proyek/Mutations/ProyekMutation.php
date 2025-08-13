<?php

namespace App\GraphQL\Proyek\Mutations;

use App\Models\Proyek\Proyek;


class ProyekMutation
{
        public function restore($_, array $args): ?Proyek
        {
            return Proyek::withTrashed()->find($args['id'])?->restore()
                ? Proyek::find($args['id'])
                : null;
        }

        public function forceDelete($_, array $args): ?Proyek
        {
            $proyek = Proyek::withTrashed()->find($args['id']);
            if ($proyek) {
                $proyek->forceDelete();
                return $proyek;
            }
            return null;
        }
}
