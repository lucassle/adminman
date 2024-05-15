<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model {
    protected $fillable = ['project_id', 'person_id', 'company_id', 'status', 'priority', 'start_time', 'end_time', 'name', 'description'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
