<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository implements RepositoryInterface
{
    protected static string $model;

    public static function model(): Model
    {
        return app(static::$model);
    }

    public static function all(): Collection
    {
        return self::model()::all();
    }

    public static function find(string $resourceId): Model | null
    {
        return self::model()::query()->find($resourceId);
    }

    public static function create(array $attributes): Model | null
    {
        return self::model()::query()->create($attributes);
    }

    public static function delete(string $resourceId): int
    {
        return self::model()::query()->where(['id' => $resourceId])->delete();
    }

    public static function update(string $resourceId, array $attributes): int
    {
        return self::model()::query()->where(['id' => $resourceId])->update($attributes);
    }
}
