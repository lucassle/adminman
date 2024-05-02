<?php

namespace App\Services;

use App\Repositories\ProjectRepository;

class ProjectService
{
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository) {
        $this->projectRepository = $projectRepository;
    }

    public function getAll() {
        return $this->projectRepository->all();
    }

    public function create(array $data) {
        return $this->projectRepository->create($data);
    }

    public function getById($id) {
        return $this->projectRepository->find($id);
    }

    public function update($id, array $data) {
        return $this->projectRepository->update($id, $data);
    }

    public function delete($id) {
        return $this->projectRepository->delete($id);
    }
}