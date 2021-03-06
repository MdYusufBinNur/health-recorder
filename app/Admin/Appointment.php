<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $guarded = [];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class,'hospital_id');
    }
}
