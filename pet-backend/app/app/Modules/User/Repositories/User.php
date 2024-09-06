<?php

declare(strict_types=1);

namespace App\Modules\User\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Modules\User\Models\User as UserModel;
use App\Repositories\AbstractRepository;

class User extends AbstractRepository implements RepositoryInterface
{
    protected static string $model = UserModel::class;
}
