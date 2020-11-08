<?php

namespace App\Http\Controllers\Admin;
use App\Admin\Hospital;
use App\Helper\Common;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HospitalController extends Controller
{
    public $common;
    public function __construct(Common $common)
    {
        return $this->common = $common;
    }

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
     * @return JsonResponse|Response
     */
    public function store(Request $request)
    {
        return $this->common->_insert($request,'hospital');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Hospital  $hospital
     * @return Response
     */
    public function show(Hospital $hospital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Hospital  $hospital
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
     * @param  \App\Admin\Hospital  $hospital
     * @return Response
     */
    public function update(Request $request, Hospital $hospital)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Hospital  $hospital
     * @return Response
     */
    public function destroy(Hospital $hospital)
    {
        //
    }
}