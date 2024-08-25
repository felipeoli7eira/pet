<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public static function all(): Collection;

    public static function create(array $attributes): Model|null;

    public static function find(int $resourceId): Model|null;

    public static function delete(int $resourceId): int;

    public static function update(int $resourceId, array $attributes): int;

    public static function model(): Model;
}
