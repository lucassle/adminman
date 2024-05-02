<?php

namespace App\Services;

use App\Repositories\CompanyRepository;

class CompanyService
{
    protected $companyRepository;

    public function __construct(CompanyRepository $companyRepository) {
        $this->companyRepository = $companyRepository;
    }

    public function getAll() {
        return $this->companyRepository->all();
    }

    public function create(array $data) {
        return $this->companyRepository->create($data);
    }

    public function getById($id) {
        return $this->companyRepository->find($id);
    }

    public function update($id, array $data) {
        return $this->companyRepository->update($id, $data);
    }

    public function delete($id) {
        return $this->companyRepository->delete($id);
    }
}