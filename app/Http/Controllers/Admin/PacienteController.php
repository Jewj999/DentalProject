<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Sexe;
use Exception;
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
                "phoneField" => "required|max:9",
                "duiField" => "nullable|unique:patients,dui",
                "dirField" => "required",
                "munField" => "required",
                "sexField" => "required"
            ]);

            if ($v->fails()) {
                return redirect()->back()->withInput($request->all())->withErrors($v->errors());
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
            return view('error', ['code' => 500, 'message' => $e->getMessage()]);
        }
    }

    public function edit(Patient $patient)
    {
        try {
            return view('admin.pacientes.edit', ['patient' => $patient]);
        } catch (Exception $e) {
            return view('error', ['code' => 500, 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, Patient $patient)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'apellido' => 'required',
            'born' => 'required',
            'phone' => 'required',
            'dui' => 'required',
            'direction' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $patient->name = $request->get('name');
        $patient->apellido = $request->get('apellido');
        $patient->born = $request->get('born');
        $patient->phone = $request->get('phone');
        $patient->dui = $request->get('dui');
        $patient->direction = $request->get('direction');
        $patient->save();

        return redirect()->intended(route('admin.pacientes.list'));
    }

    public function destroy($id)
    {
        $patient = Patient::find($id);
        if ($patient) {
            $patient->delete();
            return redirect()->route('admin.pacientes.list')->withFlashSuccess('Paciente Eliminado');
        }
        return redirect()->route('admin.pacientes.list')->withFlashSuccess('Error');
    }


    public function search(Request $request)
    {
        try {
            $route = '';
            switch ($request->route) {
                case 1:
                    $route = 'admin.pacientes.listado';
                    break;
                case 2:
                    $route = 'admin.turn.search';
                    break;
                default:
                    $route = 'admin.pacientes.listado';
                    break;
            }
            $pacientes = Patient::where('name', 'like', '%' . $request->parameter . '%')
                ->orWhere('apellido', 'like', '%' . $request->parameter . '%')
                ->orWhere('dui', 'like', '%' . $request->parameter . '%')
                ->with('sex')->sortable(['name', 'apellido'])
                ->paginate();
            return view($route, ['patients' => $pacientes, 'filter' => $request->parameter]);
        } catch (\Exception $ex) {
            return view('error', ['code' => 500, 'message' => $ex->getMessage()]);
        }
    }
}
