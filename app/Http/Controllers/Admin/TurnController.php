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
            $turns = Appointment::whereBetween('day', [Carbon::today(), Carbon::now()])->get();
            return view('admin.turn.list', ['turns' => $turns]);
        } catch (\Exception $ex) {
            return view('error', ['code' => 500, 'message' => $ex->getMessage()]);
        }
    }

    public function patientList()
    {
        try {
            $patients = Patient::all()->load('sex');
            return view('admin.turn.search', compact('patients'));
        } catch (\Exception $ex) {
            return view('error', ['code' => 500, 'message' => $ex->getMessage()]);
        }
    }

    public function appointmentList()
    {
        try {
            $appointments = Appointment::where('status_id', 1)->orderBy('hour')->get();
        } catch (\Exception $ex) {
            return view('error', ['code' => 500, 'message' => $ex->getMessage()]);
        }
    }

    public function nextPatient($patient_id)
    {
        try {
            $errors = [];
            $patient = Patient::find($patient_id);
            if ($patient == null) {
                return view('error', ['code' => 404, 'message' => 'Patient not found']);
            } else {
                $wait = Turn::where('patient_id', $patient->id)->count();
                if ($wait == 0) {
                    $appointments = Appointment::where([
                        ['day', '=', Carbon::now()->format('Y-m-d')],
                        ['status_id', '=', 1]
                    ])->get();
                    if (count($appointments)) {
                        $appointment = $appointments[0];
                        $turn = new Turn();
                        $turn->patient_id = $appointment->patient_id;
                        $turn->appointment_id = $appointment->id;
                        $turn->created_at = (new Carbon($appointment->day . ' ' . $appointment->hour));
                        $turn->save();

                        $appointment->status_id = 2;
                        $appointment->save();
                    } else {
                        $turn = new Turn();
                        $turn->patient_id = $patient->id;
                        $turn->save();
                    }
                } else {
                    array_push($errors, 'El paciente ya tiene un turno en espera');
                }
                return redirect()->route('admin.turn')->with('errors', $errors);
            }
        } catch (\Exception $ex) {
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
