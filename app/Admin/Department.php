<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];

    public function doctor()
    {
        return $this->hasMany(Doctor::class);
    }

    public function hospital()
    {
        return $this->hasManyThrough(Doctor::class, Hospital::class);
    }
}
