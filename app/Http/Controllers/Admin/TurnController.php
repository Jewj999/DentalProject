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
            $turns = Turn::whereBetween('created_at', [Carbon::today(), Carbon::now()->format('Y-m-d') . ' 23:59:59'])->orderBy('created_at')->get();
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
            $appointments = Appointment::where('day', Carbon::now()->format('Y-m-d'))->where('status_id', 1)->orderBy('hour')->get();
            return view('admin.turn.appointment', ['appointments' => $appointments]);
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

    public function nextAppointment($appointment_id)
    {
        try {
            $errors = [];
            $appointment = Appointment::find($appointment_id);
            if ($appointment == null) {
                return view('error', ['code' => 404, 'message' => 'Appointment not found']);
            } else {
                $count_turns = Turn::where('patient_id', $appointment->patient_id)->count();
                if ($count_turns != 0) {
                    array_push($errors, 'The patient is already waiting for his turn');
                } else {
                    $appointment->status_id = 2;
                    $appointment->save();

                    $turn = new Turn();
                    $turn->appointment_id = $appointment->id;
                    $turn->patient_id = $appointment->patient_id;
                    $turn->created_at = (new Carbon($appointment->day . ' ' . $appointment->hour))->toDateTimeString();
                    $turn->save();
                }
                return redirect()->route('admin.turn')->with('errors', $errors);
            }
        } catch (\Exception $ex) {
            return view('error', ['code' => 500, 'message' => $ex->getMessage()]);
        }
    }
}
