<?php

namespace App\Domain\Services\Policies;

use App\Models\User;
use App\Domain\Services\Models\Service;

class ServicePolicy
{
    public function viewAny(User $user): bool { return $user->can('service.view'); }
    public function view(User $user, Service $service): bool { return $user->can('service.view'); }
    public function create(User $user): bool { return $user->can('service.create'); }
    public function update(User $user, Service $service): bool { return $user->can('service.update'); }
    public function delete(User $user, Service $service): bool { return $user->can('service.delete'); }
}
