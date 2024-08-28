<?php

declare(strict_types=1);

namespace App\Repositories\Users;

use App\Models\User;
use App\Repositories\AbstractRepository;

abstract class Users extends AbstractRepository
{
    protected static string $model = User::class;
}
