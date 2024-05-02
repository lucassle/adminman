<?php

namespace App\Services;

use App\Repositories\CountryRepository;

class CountryService
{
    protected $countryRepository;

    public function __construct(CountryRepository $countryRepository) {
        $this->countryRepository = $countryRepository;
    }

    public function getAll() {
        return $this->countryRepository->all();
    }

    public function create(array $data) {
        return $this->countryRepository->create($data);
    }

    public function getById($id) {
        return $this->countryRepository->find($id);
    }

    public function update($id, array $data) {
        return $this->countryRepository->update($id, $data);
    }

    public function delete($id) {
        return $this->countryRepository->delete($id);
    }
}