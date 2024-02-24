<?php

namespace Infrastructure\Eloquent\Repository\BaseRepository;

use Domain\Base\Repository\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepositoryEloquent implements BaseRepositoryInterface
{
    /**
     *| ----------------------------------
     *|  Declare model using Model::class
     *| ----------------------------------
     */
    protected string $model;

    /**
     * @return Model
     */
    public function resolvedModel(): Model
    {
        return app($this->model);
    }

    /**
     * @param array $columns
     * @param array $relations
     * @return Collection
     */
    public function all(array $columns = ['*'], array $relations = []): Collection
    {
        return $this->resolvedModel()->with($relations)->get($columns);
    }

    /**
     * Get all trashed models.
     *
     * @return Collection
     */
    public function allTrashed(): Collection
    {
        return $this->resolvedModel()->onlyTrashed()->get();
    }

    /**
     * Find model by id.
     *
     * @param string $modelId
     * @param array $columns
     * @param array $relations
     * @param array $appends
     * @return Model
     */
    public function findById(
        string $modelId,
        array $columns = ['*'],
        array $relations = [],
        array $appends = []
    ): ?Model {
        return $this->resolvedModel()->select($columns)->with($relations)->findOrFail($modelId)->append($appends);
    }

    /**
     * Find trashed model by id.
     *
     * @param string $modelId
     * @return Model
     */
    public function findTrashedById(string $modelId): ?Model
    {
        return $this->resolvedModel()->withTrashed()->findOrFail($modelId);
    }

    /**
     * Find only trashed model by id.
     *
     * @param string $modelId
     * @return Model
     */
    public function findOnlyTrashedById(string $modelId): ?Model
    {
        return $this->resolvedModel()->onlyTrashed()->findOrFail($modelId);
    }

    /**
     * Create a model.
     *
     * @param array $payload
     * @return Model
     */
    public function create(array $payload): ?Model
    {
        $model = $this->resolvedModel()->create($payload);

        return $model->fresh();
    }

    /**
     * Update existing model.
     *
     * @param string $modelId
     * @param array $payload
     * @return bool
     */
    public function update(string $modelId, array $payload): ?Model
    {
        $model = $this->findById($modelId);
        $model->update($payload);
        return $model;
    }

    /**
     * Delete model by id.
     *
     * @param string $modelId
     * @return bool
     */
    public function deleteById(string $modelId): bool
    {
        return $this->findById($modelId)->delete();
    }

    /**
     * Restore model by id.
     *
     * @param string $modelId
     * @return bool
     */
    public function restoreById(string $modelId): bool
    {
        return $this->findOnlyTrashedById($modelId)->restore();
    }

    /**
     * Permanently delete model by id.
     *
     * @param string $modelId
     * @return bool
     */
    public function permanentlyDeleteById(string $modelId): bool
    {
        return $this->findTrashedById($modelId)->forceDelete();
    }
}
