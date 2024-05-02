<?php

namespace App\Services;

use App\Repositories\RoleRepository;

class RoleService
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository) {
        $this->roleRepository = $roleRepository;
    }

    public function getAll() {
        return $this->roleRepository->all();
    }

    public function create(array $data) {
        return $this->roleRepository->create($data);
    }

    public function getById($id) {
        return $this->roleRepository->find($id);
    }

    public function update($id, array $data) {
        return $this->roleRepository->update($id, $data);
    }

    public function delete($id) {
        return $this->roleRepository->delete($id);
    }
}