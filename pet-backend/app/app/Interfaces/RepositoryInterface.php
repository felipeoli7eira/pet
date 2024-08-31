<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public static function all(): Collection;

    public static function create(array $attributes): Model|null;

    public static function find(string $resourceId): Model|null;

    public static function delete(string $resourceId): int;

    public static function update(string $resourceId, array $attributes): int;

    public static function model(): Model;
}
