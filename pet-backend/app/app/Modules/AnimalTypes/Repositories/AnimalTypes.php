<?php

declare(strict_types=1);

namespace App\Modules\AnimalTypes\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Modules\AnimalTypes\Models\AnimalType as AnimalTypeModel;
use App\Repositories\AbstractRepository;

class AnimalTypes extends AbstractRepository implements RepositoryInterface
{
    protected static string $model = AnimalTypeModel::class;
}
