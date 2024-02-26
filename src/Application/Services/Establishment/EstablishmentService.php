<?php

namespace Application\Services\Establishment;

use Domain\Base\Service\BaseServiceInterface;
use Domain\Establishment\Repository\EstablishmentRepositoryInterface;
use Domain\Establishment\Resources\{
    EstablishmentResource,
    EstablishmentResourceCollection
};

class EstablishmentService extends BaseServiceInterface
{

    public function __construct(private EstablishmentRepositoryInterface $repository)
    {
    }

    public function list(): EstablishmentResourceCollection
    {
        $entity = $this->repository->all();
        return EstablishmentResourceCollection::make($entity);
    }

    public function find(string $id): EstablishmentResource
    {
        $entity = $this->repository->findById($id, relations:['address']);
        return EstablishmentResource::make($entity);
    }

    public function create(array $data): EstablishmentResource
    {
        $entity = $this->repository->create($data);
        $entity->address()->create($data['address']);
        return EstablishmentResource::make($entity);
    }

    public function update(string $id, array $data): EstablishmentResource
    {
        $entity = $this->repository->update($id, $data);
        return EstablishmentResource::make($entity);
    }

    public function remove(string $id): void
    {
        $this->repository->deleteById($id);
    }
}
