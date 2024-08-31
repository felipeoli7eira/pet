<?php

declare(strict_types=1);

namespace App\Modules\User\Repositories;

use App\Modules\User\Models\User as UserModel;
use App\Repositories\AbstractRepository;

abstract class User extends AbstractRepository
{
    protected static string $model = UserModel::class;
}
