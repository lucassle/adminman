<?php

namespace App\Repositories;

use App\Models\Person;

class PersonRepository
{
    public function all() {
        return Person::all();
    }

    public function create(array $data) {
        return Person::create($data);
    }

    public function find($id) {
        return Person::findOrFail($id);
    }

    public function update($id, array $data) {
        $person = $this->find($id);
        $person->update($data);
        return $person;
    }

    public function delete($id) {
        $person = $this->find($id);
        $person->delete();
    }
}