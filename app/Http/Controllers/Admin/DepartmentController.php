<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Department;
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

class DepartmentController extends Controller
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
        return view('Admin.CMS.departments', compact('hospitals','departments'));
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
        return Common::_notify(Common::_insert($request,'department'));
    }

    /**
     * Display the specified resource.
     *
     * @param Department $department
     * @return Builder|Model|Response|object
     */
    public function show(Department $department)
    {
        return Department::with('hospital')->where('id','=', $department->id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Department $department
     * @return Response
     */
    public function edit(Department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Department $department
     * @return Response
     */
    public function update(Request $request, Department $department): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Department $department
     * @return string
     */
    public function destroy(Department $department)
    {
        return Common::_delete($department,'department');
    }

    public function get_departments ($id) {
        return Department::where('hospital_id', $id)->get();
    }
}
