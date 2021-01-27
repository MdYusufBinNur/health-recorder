<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Ambulance;
use App\Helper\Common;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class AmbulanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|void
     */
    public function index()
    {
        $ambulances = Ambulance::all();
        return view('Admin.CMS.ambulance', compact('ambulances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
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
        return Common::_notify(Common::_insert($request,'ambulance'));
    }

    /**
     * Display the specified resource.
     *
     * @param Ambulance $ambulance
     * @return Ambulance
     */
    public function show(Ambulance $ambulance)
    {
        return $ambulance;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Ambulance $ambulance
     * @return void
     */
    public function edit(Ambulance $ambulance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Ambulance $ambulance
     * @return void
     */
    public function update(Request $request, Ambulance $ambulance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Ambulance $ambulance
     * @return string
     */
    public function destroy(Ambulance $ambulance)
    {
//        return $ambulance;
        return Common::_delete($ambulance,'ambulance');
    }
}
