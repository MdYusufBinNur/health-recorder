<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $guarded = [];

    public function hospital()
    {
        return $this->belongsTo(Hospital::class,'hospital_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }

    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }
}

