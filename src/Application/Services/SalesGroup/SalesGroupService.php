<?php

namespace Application\Services\SalesGroup;

use Domain\Base\Service\BaseServiceInterface;
use Domain\SalesGroup\Repository\SalesGroupRepositoryInterface;
use Domain\SalesGroup\Resources\SalesGroupResource;
use Domain\SalesGroup\Resources\SalesGroupResourceCollection;

class SalesGroupService extends BaseServiceInterface {

    public function __construct(private SalesGroupRepositoryInterface $repository)
    {}

    public function list(): SalesGroupResourceCollection {
        $salesGroup = $this->repository->all();
        return SalesGroupResourceCollection::make($salesGroup);
    }

    public function find(string $id): SalesGroupResource {
        $salesGroup = $this->repository->findById($id);
        return SalesGroupResource::make($salesGroup);
    }

    public function create(array $data): SalesGroupResource {
        $salesGroup = $this->repository->create($data);
        return SalesGroupResource::make($salesGroup);
    }

    public function update(string $id, array $data): SalesGroupResource {
        $salesGroup = $this->repository->update($id, $data);
        return SalesGroupResource::make($salesGroup);
    }

    public function remove(string $id): void {
        $this->repository->deleteById($id);
    }
}
