<?php

namespace Domain\Base\Service;

abstract class BaseServiceInterface {
    public abstract function list(): mixed;
    public abstract function find(string $id): mixed;
    public abstract function create(array $data): mixed;
    public abstract function update(string $id, array $data): mixed;
    public abstract function remove(string $id): void;
}
