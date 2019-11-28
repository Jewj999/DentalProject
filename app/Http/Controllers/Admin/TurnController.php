<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Consultation;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Turn;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TurnController extends Controller
{
    public function index()
    {
        try {
            $turns = Turn::whereBetween('created_at', [Carbon::today(), Carbon::now()])->orderBy('created_at')->get()->load('patient', 'appointment');
            return view('admin.turn.list', ['turns' => $turns]);
        } catch (\Exception $ex) {
            return view('error', ['code' => 500, 'message' => $ex->getMessage()]);
        }
    }

    public function consultationList() {
        try {
            $consultations = Consultation::whereBetween('created_at', [Carbon::today(), Carbon::now()])->orderBy('created_at')->get();
        }catch (\Exception $ex) {
            return view('error', ['code' => 500, 'message' => $ex->getMessage()]);
        }
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    public function show(Turn $turn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    public function edit(Turn $turn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turn $turn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turn $turn)
    {
        //
    }
}
