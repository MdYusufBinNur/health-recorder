<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded = [];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class,'hospital_id');
    }

    public function doctor()
    {
        return $this->hasMany(Doctor::class);
    }
}
