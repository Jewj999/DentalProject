<?php

namespace App\Http\Controllers\Admin;

use App\Consultation;
use App\Http\Controllers\Controller;
use App\Turn;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index() {
        $consultations = Consultation::where('status_id', '=', 2)->orderBy('created_at')->get()->load('services');
            foreach ($consultations as $consultation) {
                $total = 0;
                foreach ($consultation->services as $service) {
                    $total += $service->price;
                }
                $consultation->price = $total;
                $turn = Turn::onlyTrashed()->where('id', $consultation->turn_id)->first()->load('patient');
                $consultation->turn = $turn;
                // Get age
                $age = date_diff(new Carbon($consultation->turn->patient->born), Carbon::now());
                $consultation->turn->patient->age = $age->format('%y');
            }
        return view('admin.report.index', ['consultations'=>$consultations]);
    }
}
