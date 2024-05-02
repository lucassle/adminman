<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Role extends Model {
    protected $fillable = ['role', 'description'];

    public function user() {
        return $this->belongsToMany(User::class);
    }
}
