<?php

namespace App\Services;

use App\Repositories\PersonRepository;

class PersonService
{
    protected $personRepository;

    public function __construct(PersonRepository $personRepository) {
        $this->personRepository = $personRepository;
    }

    public function getAll() {
        return $this->personRepository->all();
    }

    public function create(array $data) {
        return $this->personRepository->create($data);
    }

    public function getById($id) {
        return $this->personRepository->find($id);
    }

    public function update($id, array $data) {
        return $this->personRepository->update($id, $data);
    }

    public function delete($id) {
        return $this->personRepository->delete($id);
    }
}