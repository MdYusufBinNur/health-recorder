<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Appointment;
use App\Helper\Common;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AppointmentController extends Controller
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
     * @return string
     */
    public function store(Request $request)
    {
        return Common::_insert($request, 'appointment');
    }

    /**
     * Display the specified resource.
     *
     * @param Appointment $appointment
     * @return Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Appointment $appointment
     * @return Response
     */
    public function edit(Appointment $appointment)
    {
        return "hi";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Appointment $appointment
     * @return JsonResponse
     */
    public function update(Request $request, Appointment $appointment)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Appointment $appointment
     * @return string
     */
    public function destroy(Appointment $appointment)
    {
        return Common::_delete($appointment, 'appointment');
    }

    public function updateAppointmentInfo($id)
    {
        $appointment = Appointment::find($id);
        if ($appointment)
        {
            if ($appointment->update(['status' => 'checked']))
            {
                return back()->with(array(
                    'message' => "Appointment Status Updated",
                    'alert-type' => 'success'
                ));
            }
        }
        return back()->with(array(
            'message' => "Failed !!!",
            'alert-type' => 'error'
        ));
    }
}
