<?php

declare(strict_types=1);

namespace App\Modules\Pet\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Modules\Pet\Models\Pet as PetModel;
use App\Repositories\AbstractRepository;

class Pet extends AbstractRepository implements RepositoryInterface
{
    protected static string $model = PetModel::class;
}
