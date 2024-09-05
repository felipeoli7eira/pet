<?php

declare(strict_types=1);

namespace App\Modules\Customer\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Modules\Customer\Models\Customer as CustomerModel;
use App\Repositories\AbstractRepository;

class Customer extends AbstractRepository implements RepositoryInterface
{
    protected static string $model = CustomerModel::class;
}
