<?php

namespace App\Http\Controllers\Admin;
use App\Admin\Department;
use App\Admin\Hospital;
use App\Helper\Common;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
         $hospitals = Hospital::all();
         $departments = Department::all();
        return view('Admin.CMS.hospital', compact('hospitals','departments'));
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
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        //return Common::_insert($request,'hospital');
        return Common::_notify(Common::_insert($request,'hospital'));
    }

    /**
     * Display the specified resource.
     *
     * @param Hospital $hospital
     * @return Hospital
     */
    public function show(Hospital $hospital)
    {
        return $hospital;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Hospital $hospital
     * @return Response
     */
    public function edit(Hospital $hospital)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Hospital $hospital
     * @return Response
     */
    public function update(Request $request, Hospital $hospital)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Hospital $hospital
     * @return string
     */
    public function destroy(Hospital $hospital)
    {
        return Common::_delete($hospital,'hospital');
    }
}
