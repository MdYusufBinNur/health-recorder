<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Ambulance;
use App\Admin\Appointment;
use App\Admin\Department;
use App\Admin\Doctor;
use App\Admin\Donor;
use App\Admin\Hospital;
use App\Admin\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    function getDoctors()
    {
        return Department::with('doctor')->get();
    }
    public function getHospitals()
    {
        return response()->json(Hospital::with('department')->get());
    }

    public function getHospitalDetails($id)
    {
       return Hospital::with('department.doctor')->where('id','=',$id)->first();
    }

    public function getDoctorWiseHospital($id)
    {
        return response()->json(Doctor::with('hospital','department')->where('id','=',$id)->first());
    }
    public function getAppointmentList($id)
    {
        return response()->json(Appointment::with('doctor.hospital')->where('user_id','=',$id)->get());
    }
    public function getAmbulances()
    {
        return response()->json(Ambulance::all());
    }
    public function getDonors()
    {
        return response()->json(Donor::all());
    }

    public function getSliders()
    {
        return response()->json(Slider::all());
    }
}
