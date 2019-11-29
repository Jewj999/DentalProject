<?php

namespace App\Http\Controllers\Admin;

use App\Consultation;
use App\Http\Controllers\Controller;
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
                $total = 0;
                foreach ($consultation->services as $service) {
                    $total += $service->price;
                }
                $consultation->price = $total;
            }
            return view('admin.turn.consultation', ['consultations' => $consultations]);
        } catch (\Exception $ex) {
            return view('error', ['code' => 500, 'message' => $ex->getMessage()]);
        }
    }

    public function create()
    {
        //
    }

    public function store($turn_id)
    {
        try {
            $turn = Turn::find($turn_id);
            if ($turn == null) {
                return view('error', ['code' => 404, 'message' => 'Turn not found']);
            } else {
                $consultation = new Consultation();
                $consultation->speciality = '';
                $consultation->turn_id = $turn->id;
                $consultation->status_id = 1;
                $consultation->save();

                $turn->delete();

                return redirect()->route('admin.turn');
            }
        } catch (\Exception $ex) {
            return view('error', ['code' => 500, 'message' => $ex->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function show(Consultation $consultation)
    {
        //
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
}
