<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Person;

class Company extends Model {
    protected $fillable = ['code', 'name', 'address'];

    public function person() {
        return $this->hasMany(Person::class);
    }
}
