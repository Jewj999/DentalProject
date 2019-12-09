<?php

namespace App\Http\Controllers\Admin;

use App\Consultation;
use App\Http\Controllers\Controller;
use App\Turn;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;


class ReportController extends Controller
{
    public function index()
    {
        $consultations = Consultation::where('status_id', '=', 2)->orderBy('created_at')->get()->load('services');
        $consultations = $this->getPatients($consultations);
        return view('admin.report.index', ['consultations' => $consultations]);
    }

    public function search(Request $request)
    {
        $consultations = Consultation::whereBetween('created_at', [$request->init . " 00:00:00", $request->final . " 23:59:59"])->orderBy('created_at')->get();
        $consultations = $this->getPatients($consultations);

        return view('admin.report.index', ['consultations' => $consultations]);
    }

    public function getPatients($consultations)
    {
        foreach ($consultations as $consultation) {
            $turn = Turn::onlyTrashed()->where('id', $consultation->turn_id)->first()->load('patient');
            $consultation->turn = $turn;
            // Get age
            $age = date_diff(new Carbon($consultation->turn->patient->born), Carbon::now());
            $consultation->turn->patient->age = $age->format('%y');
        }
        return $consultations;
    }

    public function generalReport(Request $request)
    {
        try {
            $dates = [
                'init' => $request->init,
                'final' => $request->final
            ];
            $consultations = Consultation::whereBetween('created_at', [$request->init . " 00:00:00", $request->final . " 23:59:59"])->orderBy('created_at')->get();
            if ($consultations == null) {
                return view('error', ['code' => 404, 'message' => 'Consultation not found']);
            } else {
                foreach ($consultations as $consultation) {
                    $consultation = $this->fillConsultation($consultation);
                    $consultation->patient = $consultation->turn->patient;
                }
                // Create PDF
                $pdf_name = 'Reporte General';
                $pdf = PDF::loadView('admin.report.report', compact('consultations', 'dates'));
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
