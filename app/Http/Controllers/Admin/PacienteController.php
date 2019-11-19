<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index(Request $request){
        return view('admin.pacientes.index');
    }

    public function new(Request $request){
        return view('admin.pacientes.nuevo');
    }
}
