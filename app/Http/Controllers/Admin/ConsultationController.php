<?php

namespace App\Http\Controllers\Admin;

use App\Consultation;
use App\Http\Controllers\Controller;
use App\Job;
use App\Service;
use App\Tooth;
use App\Turn;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index()
    {
        try {
            $consultations = Consultation::whereBetween('created_at', [Carbon::today(), Carbon::now()])->where('status_id', '!=', 1)->orderBy('created_at')->get()->load('services');
            foreach ($consultations as $consultation) {
                $turn = Turn::onlyTrashed()->where('id', $consultation->turn_id)->first()->load('patient');
                $consultation->turn = $turn;
                // Get age
                $age = date_diff(new Carbon($consultation->turn->patient->born), Carbon::now());
                $consultation->turn->patient->age = $age->format('%y');
            }
            return view('admin.turn.consultation', ['consultations' => $consultations]);
        } catch (\Exception $ex) {
            return view('error', ['code' => 500, 'message' => $ex->getMessage()]);
        }
    }

    public function create()
    { }

    public function store($turn_id)
    {
        try {
            $errors = [];
            $turn = Turn::find($turn_id);
            if ($turn == null) {
                return view('error', ['code' => 404, 'message' => 'Turn not found']);
            } else {
                $active = Consultation::where('status_id', 1)->count();
                if ($active == 0) {
                    $consultation = new Consultation();
                    $consultation->speciality = '';
                    $consultation->turn_id = $turn->id;
                    $consultation->status_id = 1;
                    $consultation->save();

                    $turn->delete();
                } else {
                    array_push($errors, 'Ya se encuentra un paciente siendo atendido');
                }
                return redirect()->route('admin.turn')->with('errors', $errors);
            }
        } catch (\Exception $ex) {
            return view('error', ['code' => 500, 'message' => $ex->getMessage()]);
        }
    }

    public function show()
    {
        try {
            $consultation = Consultation::where('status_id', 1)->first();
            if ($consultation != null) {
                $consultation = $this->fillConsultation($consultation);
            }
            $services = Service::all();
            $jobs = Job::all();
            $tooth = Tooth::all();
            return view('admin.consultation.index', ['consultation' => $consultation, 'services' => $services, 'jobs' => $jobs, 'tooth' => $tooth]);
        } catch (\Exception $ex) {
            return view('error', ['code' => 500, 'message' => $ex->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function edit(Consultation $consultation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consultation $consultation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consultation $consultation)
    {
        //
    }

    private function fillConsultation(Consultation $consultation)
    {
        $turn = Turn::onlyTrashed()->where('id', $consultation->turn_id)->first()->load('patient');
        $consultation->turn = $turn;
        // Get age
        $age = date_diff(new Carbon($consultation->turn->patient->born), Carbon::now());
        $consultation->turn->patient->age = $age->format('%y');
        return $consultation;
    }
}
