<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
class Hospital extends Model
{
    protected $guarded = [];

    public function doctor()
    {
        return $this->hasMany(Doctor::class);
    }
}
