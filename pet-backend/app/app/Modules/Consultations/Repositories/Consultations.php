<?php

declare(strict_types=1);

namespace App\Modules\Consultations\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Modules\Consultations\Models\Consultations as ConsultationsModel;
use App\Repositories\AbstractRepository;

class Consultations extends AbstractRepository implements RepositoryInterface
{
    protected static string $model = ConsultationsModel::class;
}
