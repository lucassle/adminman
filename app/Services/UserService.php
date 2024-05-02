<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function getAll() {
        return $this->userRepository->all();
    }

    public function create(array $data) {
        return $this->userRepository->create($data);
    }

    public function getById($id) {
        return $this->userRepository->find($id);
    }

    public function update($id, array $data) {
        return $this->userRepository->update($id, $data);
    }

    public function delete($id) {
        return $this->userRepository->delete($id);
    }
}