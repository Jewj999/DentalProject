<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Http\Controllers\Controller;
use App\Patient;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function index()
    {
        try {
            $appointments = Appointment::all();
            return view('admin.appointment.list', ['data' => $appointments]);
        } catch (\Exception $ex) {
            return view('error', ['code' => 500, 'message' => $ex->getMessage()]);
        }
    }

    public function create($patient_id)
    {
        try {
            $patient = Patient::find($patient_id)->load('sex');
            if ($patient == null) {
                return view('error', ['code' => 404, 'message' => 'Patient not found']);
            } else {
                $age = date_diff(new DateTime(), new DateTime($patient->born));
                $patient->age = round($age->days / 365);
                return view('admin.appointment.new', ['patient' => $patient, 'appointment' => new Appointment()]);
            }
        } catch (\Exception $ex) {
            return view('error', ['code' => 500, 'message' => $ex->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'patient_id' => 'required',
                'day' => 'required|date',
                'hour' => 'required',
                'reason' => 'nullable'
            ]);
            $patient = Patient::find($request->patient_id);
            if ($patient == null) {
                return view('error', ['code' => 404, 'message' => 'Patient not found']);
            } else {
                $appointment = new Appointment();
                $appointment->day = $request->day;
                $appointment->hour = $request->hour;
                $appointment->reason = $request->reason;
                if ($validator->fails()) {
                    return redirect()->back()->withInput($request->all())->withErrors($validator->errors());
                } else {
                    $now = Carbon::now();
                    $appointmen_date = new Carbon($request->day . ' ' . $request->hour);
                    if ($now > $appointmen_date) {
                    }
                }
            }
        } catch (\Exception $ex) {
            return view('error', ['code' => 500, 'message' => $ex->getMessage()]);
        }
    }
}
