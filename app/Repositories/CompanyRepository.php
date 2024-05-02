<?php

namespace App\Repositories;

use App\Models\Company;

class CompanyRepository
{
    public function all() {
        return Company::all();
    }

    public function create(array $data) {
        return Company::create($data);
    }

    public function find($id) {
        return Company::findOrFail($id);
    }

    public function update($id, array $data) {
        $company = $this->find($id);
        $company->update($data);
        return $company;
    }

    public function delete($id) {
        $company = $this->find($id);
        $company->delete();
    }
}