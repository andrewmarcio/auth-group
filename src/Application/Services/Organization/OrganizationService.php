<?php

namespace Application\Services\Organization;

use Domain\Base\Service\BaseServiceInterface;
use Domain\Organization\Repository\OrganizationRepositoryInterface;
use Domain\Organization\Resources\OrganizationResource;
use Domain\Organization\Resources\OrganizationResourceCollection;
use Domain\Organization\Resources\OrganizationWithRelationsResource;

class OrganizationService extends BaseServiceInterface {

    public function __construct(private OrganizationRepositoryInterface $repository)
    {}

    public function list(): OrganizationResourceCollection {
        $Organization = $this->repository->all();
        return OrganizationResourceCollection::make($Organization);
    }

    public function find(string $id): OrganizationWithRelationsResource {
        $Organization = $this->repository->findById($id);
        return OrganizationWithRelationsResource::make($Organization);
    }

    public function create(array $data): OrganizationResource {
        $Organization = $this->repository->create($data);
        return OrganizationResource::make($Organization);
    }

    public function update(string $id, array $data): OrganizationResource {
        $Organization = $this->repository->update($id, $data);
        return OrganizationResource::make($Organization);
    }

    public function remove(string $id): void {
        $this->repository->deleteById($id);
    }
}
