<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Log;

class LogController extends Controller
{
    public function index()
    {
        $logs = Log::with('user')->get();
        return view('admin.logs.listado', ["logs" => $logs]);
    }
}
