<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Person;
use App\Models\Role;

class User extends Model {
    protected $fillable = ['email', 'password', 'is_active'];

    public function person() {
        return $this->hasOne(Person::class);
    }

    public function roles() {
        return $this->belongsToMany(Role::class);
    }
}
