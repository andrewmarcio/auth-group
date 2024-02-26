<?php

namespace Infrastructure\Eloquent\Repository\BaseRepository;

use Domain\Base\Repository\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

        try {
            DB::beginTransaction();
            $model = $this->resolvedModel()->create($payload);
            DB::commit();
            return $model->fresh();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
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
        try {
            DB::beginTransaction();
            $model = $this->findById($modelId);
            $model->update($payload);
            DB::commit();
            return $model;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Delete model by id.
     *
     * @param string $modelId
     * @return bool
     */
    public function deleteById(string $modelId): bool
    {
        try {
            DB::beginTransaction();
            $this->findById($modelId)->delete();
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        return false;
    }

    /**
     * Restore model by id.
     *
     * @param string $modelId
     * @return bool
     */
    public function restoreById(string $modelId): bool
    {
        try {
            DB::beginTransaction();
            $this->findOnlyTrashedById($modelId)->restore();
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Permanently delete model by id.
     *
     * @param string $modelId
     * @return bool
     */
    public function permanentlyDeleteById(string $modelId): bool
    {
        try {
            DB::beginTransaction();
            $this->findTrashedById($modelId)->forceDelete();
            DB::commit();
            return true;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
