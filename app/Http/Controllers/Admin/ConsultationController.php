<?php

namespace App\Http\Controllers\Admin;

use App\Consultation;
use App\DetailConsultationService;
use App\DetailToothConsultation;
use App\Http\Controllers\Controller;
use App\Job;
use App\Service;
use App\Tooth;
use App\Turn;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade as PDF;

class ConsultationController extends Controller
{

    public function __construct()
    {
        // $this->middleware('guest')->only(['show', 'update']);
    }
    public function index()
    {
        try {
            $consultations = Consultation::whereBetween('created_at', [Carbon::today(), Carbon::now()])->where('status_id', '!=', 1)->orderBy('created_at')->get()->load('services');
            foreach ($consultations as $consultation) {
                $consultation = $this->fillConsultation($consultation);
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
                    $consultation->turn_id = $turn->id;
                    $consultation->status_id = 1;
                    $consultation->save();

                    $turn->delete();
                } else {
                    array_push($errors, 'Ya se encuentra un paciente siendo atendido');
                }
                return redirect()->route('admin.consultation.active')->with('errors', $errors);
            }
        } catch (\Exception $ex) {
            return view('error', ['code' => 500, 'message' => $ex->getMessage()]);
        }
    }

    public function show()
    {
        try {
            $services = Service::all();
            $jobs = Job::all();
            $teeth = Tooth::all();
            $consultation = Consultation::where('status_id', 1)->first();
            if ($consultation != null) {
                $consultation = $this->fillConsultation($consultation);
                $details = DetailToothConsultation::where('consultation_id', $consultation->id)->select('tooth_id')->get();
                $teeth_worked = [];
                foreach ($details as $detail) {
                    array_push($teeth_worked, $detail->tooth_id);
                }
                foreach ($teeth as $tooth) {
                    if (in_array($tooth->id, $teeth_worked)) {
                        $tooth->job = true;
                    }
                }
                $patient = $consultation->turn->patient->name .  $consultation->turn->patient->apellido;
            }else{
                $patient = "";

            }
            return view('admin.consultation.index', ['patient' => $patient, 'consultation' => $consultation, 'services' => $services, 'jobs' => $jobs, 'tooth' => $teeth]);
        } catch (\Exception $ex) {
            return view('error', ['code' => 500, 'message' => $ex->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'consultation' => 'required|exists:consultations,id',
                'service' => 'required|array',
                'comment' => 'nullable'
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            } else {
                $consultation = Consultation::find($request->consultation);
                $consultation->comment = $request->comment;
                $consultation->status_id = 2;
                $consultation->save();

                foreach ($request->service as $service) {
                    $detail = new DetailConsultationService();
                    $detail->consultation_id = $consultation->id;
                    $detail->service_id = $service;
                    $detail->save();
                }

                return redirect()->route('admin.consultation.active');
            }
        } catch (\Exception $ex) {
            return view('error', ['code' => 500, 'message' => $ex->getMessage()]);
        }
    }

    // API routes
    public function saveJob(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'teeth' => 'required|exists:teeth,id',
                'consultation' => 'required|exists:consultations,id',
                'jobs' => 'array'
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Some errors found',
                    'blob' => $validator->errors()->all()
                ], 400);
            } else {
                $detail = DetailToothConsultation::where([
                    ['consultation_id', '=', $request->consultation],
                    ['tooth_id', '=', $request->teeth]
                ])->delete();
                $changed = count($request->jobs);
                foreach ($request->jobs as $job) {
                    $detailJob = new DetailToothConsultation();
                    $detailJob->tooth_id = $request->teeth;
                    $detailJob->consultation_id = $request->consultation;
                    $detailJob->job_id = $job;
                    $detailJob->save();
                }
                return response()->json([
                    'message' => 'Jobs saved',
                    'blob' => $changed
                ]);
            }
        } catch (\Exception $ex) {
            return response()->json([
                'message' => $ex->getMessage(),
                'blob' => []
            ], 500);
        }
    }

    public function getJob($consultation_id, $tooth_id)
    {
        try {
            $details = DetailToothConsultation::where([
                ['consultation_id', '=', $consultation_id],
                ['tooth_id', '=', $tooth_id]
            ])->get();
            return response()->json([
                'message' => 'Detail getted',
                'blob' => $details
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => $ex->getMessage(),
                'blob' => []
            ], 500);
        }
    }

    public function createPDF($consultation_id)
    {
        try {
            $consultation = Consultation::find($consultation_id);
            if ($consultation == null) {
                return view('error', ['code' => 404, 'message' => 'Consultation not found']);
            } else {
                $consultation = $this->fillConsultation($consultation);
                // Fill teeth information
                $jobs = Job::all();
                $teeth = Tooth::all();
                $details = DetailToothConsultation::where('consultation_id', $consultation->id)->get();
                foreach ($teeth as $tooth) {
                    $teeth_jobs = [];
                    foreach ($details as $detail) {
                        if ($detail->tooth_id == $tooth->id) {
                            array_push($teeth_jobs, $detail->job_id);
                        }
                    }
                    $tooth->jobs = $teeth_jobs;
                }
                $consultation->teeth = $teeth;
                // Create PDF
                $turns = Turn::where('patient_id', $consultation->turn->patient->id)->count();
                $pdf_name = $consultation->turn->patient->apellido . '-' . $consultation->turn->patient->name . '_' . $turns . '.pdf';
                $services = $consultation->services;
                $pdf = PDF::loadView('admin.consultation.report', compact('consultation', 'jobs', 'services'));
                return $pdf->stream();
            }
        } catch (\Exception $ex) {
            return view('error', ['code' => 500, 'message' => $ex->getMessage()]);
        }
    }

    private function fillConsultation(Consultation $consultation)
    {
        $turn = Turn::onlyTrashed()->where('id', $consultation->turn_id)->first()->load('patient', 'appointment');
        $consultation->turn = $turn;
        // Get age
        $age = date_diff(new Carbon($consultation->turn->patient->born), Carbon::now());
        $consultation->turn->patient->age = $age->format('%y');
        return $consultation;
    }
}
