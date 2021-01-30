<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Ambulance;
use App\Admin\Appointment;
use App\Admin\Department;
use App\Admin\Doctor;
use App\Admin\Donor;
use App\Admin\Hospital;
use App\Admin\Schedule;
use App\Admin\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    function getDoctors()
    {
        return Department::with('doctor')->get();
    }

    public function getHospitals()
    {
        return response()->json(Hospital::all());
    }

    public function getHospitalDetails($id)
    {
        $hospital = Hospital::where('id', '=', $id)->first();

        $departments = DB::table('hospitals')
            ->join('doctors', 'hospitals.id', '=', 'doctors.hospital_id')
            ->join('departments', 'departments.id', '=', 'doctors.department_id')
            ->select('departments.*')
            ->groupBy('departments.id')
            ->get();
        $doctors = Doctor::where('hospital_id', $id)->get();

        return compact('departments','doctors','hospital');
    }

    public function getDoctorWiseHospital($id)
    {
        return response()->json(Doctor::with('hospital', 'department')->where('id', '=', $id)->first());
    }

    public function getAppointmentList($id)
    {
        return response()->json(Appointment::with('doctor.hospital')->where('user_id', '=', $id)->get());
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

    public function getScheduleList($id) {
        return Schedule::where('user_id',$id)->get();
    }
}
