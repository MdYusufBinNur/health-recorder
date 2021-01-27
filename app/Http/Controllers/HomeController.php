<?php

namespace App\Http\Controllers;

use App\Admin\Ambulance;
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
        return view('home', compact('hospitals','ambulances','donors','doctors'));
    }
}
