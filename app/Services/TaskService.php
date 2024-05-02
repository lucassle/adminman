<?php

namespace App\Services;

use App\Repositories\TaskRepository;

class TaskService
{
    protected $taskRepository;

    public function __construct(TaskRepository $taskRepository) {
        $this->taskRepository = $taskRepository;
    }

    public function getAll() {
        return $this->taskRepository->all();
    }

    public function create(array $data) {
        return $this->taskRepository->create($data);
    }

    public function getById($id) {
        return $this->taskRepository->find($id);
    }

    public function update($id, array $data) {
        return $this->taskRepository->update($id, $data);
    }

    public function delete($id) {
        return $this->taskRepository->delete($id);
    }
}