<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $guarded = [];

    public function department()
    {
        return $this->hasMany(Department::class);
    }

    public function doctor()
    {
        return $this->hasMany(Doctor::class);
    }
}
