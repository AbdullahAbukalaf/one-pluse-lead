<?php

namespace App\Domain\Services\Actions;

use App\Domain\Services\Models\Service;

class CreateService
{
    public function __invoke(array $data): Service
    {
        return Service::create($data);
    }
}
