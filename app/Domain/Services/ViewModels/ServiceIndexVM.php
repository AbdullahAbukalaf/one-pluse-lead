<?php

namespace App\Domain\Services\ViewModels;

use App\Domain\Services\Models\Service;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ServiceIndexVM
{
    public function __construct(public readonly int $perPage = 15) {}

    public function services(): LengthAwarePaginator
    {
        return Service::orderBy('position')->paginate($this->perPage);
    }
}
