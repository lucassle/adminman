<?php

namespace App\Repositories;

use App\Models\Country;

class CountryRepository
{
    public function all() {
        return Country::all();
    }

    public function create(array $data) {
        return Country::create($data);
    }

    public function find($id) {
        return Country::findOrFail($id);
    }

    public function update($id, array $data) {
        $country = $this->find($id);
        $country->update($data);
        return $country;
    }

    public function delete($id) {
        $country = $this->find($id);
        $country->delete();
    }
}