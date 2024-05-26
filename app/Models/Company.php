<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Person;
use App\Models\Department;

class Company extends Model {
    protected $fillable = ['code', 'name', 'address', 'company_id'];

    public function person() {
        return $this->hasMany(Person::class);
    }

    public function departments() {
        return $this->hasMany(Department::class);
    }
}
