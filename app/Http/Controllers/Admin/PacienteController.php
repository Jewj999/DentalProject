<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Sexe;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.pacientes.index');
    }

    public function new(Request $request)
    {
        $sexes = Sexe::all();
        $dptos = Department::all();
        return view('admin.pacientes.nuevo', ["dptos" => $dptos, "sexes" => $sexes]);
    }

    public function list(Request $request)
    {
        $pacientes = Patient::all()->load('sex');
        return view('admin.pacientes.listado', ["patients" => $pacientes]);
    }

    public function create(Request $request)
    {
        try {
            $paciente = new Patient();
            $paciente->name = $request->nameField;
            $paciente->apellido = $request->lastNameField;
            $paciente->born = $request->bornField;
            $paciente->phone = $request->phoneField;
            $paciente->dui = $request->duiField ?? null;
            $paciente->direction = $request->dirField;
            $paciente->municipality_id = $request->munField;
            $paciente->sex_id = $request->sexField;

            $paciente->save();

            return redirect()->route('admin.pacientes.list');
        } catch (\Exception $ex) {
            return view('error', ['code' => 500, message => $ex->getMessage()]);
        }
    }
}
