<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sexe;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function new(Request $request)
    {

        $sexes = Sexe::all();
        $dptos = Department::all();
        return view('admin.services.nuevo', ["dptos" => $dptos, "sexes" => $sexes]);
    }

    public function list(Request $request)
    {
        // return view('admin.pacientes.listado', ["patients" => Patient::with('gender')->sortable(['name', 'apellido'])->paginate()]);

        $services = Service::sortable(['name', 'apellido'])->paginate();
        return view('admin.services.listado', ["services" => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $v = Validator::make($request->all(), [
                "nameField" => "required",
            ]);

            if ($v->fails()) {
                return redirect()->back()->withErrors($v->errors());
            }

            $servicio = new Service();
            $servicio->name = $request->nameField;

            $servicio->save();
            return redirect()->route('admin.servicios.list', ["create_success" => "Se ha creado correctament"]);
        } catch (\Exception $e) {
            return view('error', ['code' => 500, 'message' => $e->getMessage()]);
        }
    }

    public function edit(Service $service)
    {
        try {
            return view('admin.services.edit', ['service' => $service]);
        } catch (\Exception $e) {
            return view('error', ['code' => 500, 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, Service $service)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255'
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $service->name = $request->get('name');
        $service->save();
        return redirect()->intended(route('admin.servicios.list'))->withFlashSuccess('Editado');
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        if ($service) {
            $service->delete();
            return redirect()->route('admin.servicios.list')->withFlashSuccess('Servicio Eliminado');
        }
        return redirect()->route('admin.servicios.list')->withFlashSuccess('Error');
    }
}
