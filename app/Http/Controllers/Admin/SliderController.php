<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Slider;
use App\Helper\Common;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('Admin.CMS.slider', compact('sliders'));
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
        return Common::_notify(Common::_insert($request, 'slider'));
    }

    /**
     * Display the specified resource.
     *
     * @param Slider $slider
     * @return Slider
     */
    public function show(Slider $slider)
    {
       return $slider;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Slider $slider
     * @return Response
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Slider $slider
     * @return Response
     */
    public function update(Request $request, Slider $slider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Slider $slider
     * @return string
     */
    public function destroy(Slider $slider)
    {
        return Common::_delete($slider, 'slider');
    }
}
