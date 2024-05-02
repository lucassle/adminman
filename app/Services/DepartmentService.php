<?php

namespace App\Services;

use App\Repositories\DepartmentRepository;

class DepartmentService
{
    protected $departmentRepository;

    public function __construct(DepartmentRepository $departmentRepository) {
        $this->departmentRepository = $departmentRepository;
    }

    public function getAll() {
        return $this->departmentRepository->all();
    }

    public function create(array $data) {
        return $this->departmentRepository->create($data);
    }

    public function getById($id) {
        return $this->departmentRepository->find($id);
    }

    public function update($id, array $data) {
        return $this->departmentRepository->update($id, $data);
    }

    public function delete($id) {
        return $this->departmentRepository->delete($id);
    }
}