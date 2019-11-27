<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Sexe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        // return view('admin.pacientes.listado', ["patients" => Patient::with('gender')->sortable(['name', 'apellido'])->paginate()]);

        $pacientes = Patient::with('sex')->sortable(['name', 'apellido'])->paginate();
        return view('admin.pacientes.listado', ["patients" => $pacientes]);
    }

    public function create(Request $request)
    {
        try {
            $v = Validator::make($request->all(), [
                "nameField" => "required",
                "lastNameField" => "required",
                "bornField" => "required",
                "phoneField" => "required",
                "duiField" => "required",
                "dirField" => "required",
                "munField" => "required",
                "sexField" => "required"
            ]);

            if ($v->fails()) {
                dd($v->errors());
                return redirect()->back()->withErrors($v->errors());
            }

            $paciente = new Patient();
            $paciente->name = $request->nameField;
            $paciente->apellido = $request->lastNameField;
            $paciente->born = $request->bornField;
            $paciente->phone = $request->phoneField;
            $paciente->dui = $request->duiField;
            $paciente->direction = $request->dirField;
            $paciente->municipality_id = $request->munField;
            $paciente->sex_id = $request->sexField;
            $paciente->save();
            return redirect()->route('admin.pacientes.list', ["create_success" => "Se ha creado correctament"]);
        } catch (\Exception $e) {
            return view('error', ['code' => 500, message => $e->getMessage()]);
        }
    }
}
