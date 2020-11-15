<?php

namespace App\Http\Controllers\Admin;
use App\Admin\Doctor;
use App\Helper\Common;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        return Common::_insert($request,'doctor');
    }

    /**
     * Display the specified resource.
     *
     * @param Doctor $doctor
     * @return Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Doctor $doctor
     * @return Response
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
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Doctor $doctor
     * @return JsonResponse
     */
    public function destroy(Request $doctor)
    {
        return Common::_delete($doctor, 'doctor');
    }
}
