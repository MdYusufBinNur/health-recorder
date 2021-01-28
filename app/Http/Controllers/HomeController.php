<?php

namespace App\Http\Controllers;

use App\Admin\Ambulance;
use App\Admin\Appointment;
use App\Admin\Doctor;
use App\Admin\Donor;
use App\Admin\Hospital;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hospitals = Hospital::all()->count();
        $ambulances = Ambulance::all()->count();
        $donors = Donor::all()->count();
        $doctors = Doctor::all()->count();
        $role = auth()->user()->role;
        switch ($role) {
            case 'admin':
                return view('home', compact('hospitals', 'ambulances', 'donors', 'doctors'));
                break;
            case 'doctor':
                $appointments = Appointment::with('hospital')->where('doctor_id', auth()->user()->doctor->id)->get();
                return view('Admin.CMS.appointments',compact('appointments'));
                break;
        }
    }
}
