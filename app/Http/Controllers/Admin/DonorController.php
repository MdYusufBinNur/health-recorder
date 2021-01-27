<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Donor;
use App\Helper\Common;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $donors = Donor::all();
        return view('Admin.CMS.donors', compact('donors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        return Common::_notify(Common::_insert($request,'donor'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Donor  $donor
     * @return Donor
     */
    public function show(Donor $donor)
    {
        return $donor;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function edit(Donor $donor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Donor  $donor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Donor $donor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Donor  $donor
     * @return string
     */
    public function destroy(Donor $donor)
    {
        return Common::_delete($donor, 'donor');
    }
}
