<?php

namespace App\Http\Controllers\Admin;
use App\Admin\Department;
use App\Admin\Doctor;
use App\Admin\Hospital;
use App\Helper\Common;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $hospitals = Hospital::all();
        $doctors = Doctor::all();
        $department = Department::all();
        return view('Admin.CMS.doctor', compact('doctors','hospitals','department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
//        return Common::_insert($request,'doctor');
        return Common::_notify(Common::_insert($request,'doctor'));
    }

    /**
     * Display the specified resource.
     *
     * @param Doctor $doctor
     * @return Builder|Model|Response|object
     */
    public function show(Doctor $doctor)
    {
        return Doctor::with('hospital','department')->where('id','=', $doctor->id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Doctor $doctor
     * @return void
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Doctor $doctor
     * @return Response
     */
    public function update(Request $request, Doctor $doctor): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Doctor $doctor
     * @return JsonResponse|string
     */
    public function destroy(Doctor $doctor)
    {
        return Common::_delete($doctor, 'doctor');
    }
}
