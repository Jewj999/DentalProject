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

    public function search(Request $request)
    {
        try {
            if (trim($request->parameter) == '') {
                return redirect()->route('admin.logs.list');
            } else {
                $logs = Log::join('users', 'logs.user_id', '=', 'users.id')
                    ->when($request->parameter, function ($query, $parameter) {
                        $query->where('users.name', 'like', '%' . $parameter . '%')
                        ->orWhere('logs.action', 'like', '%' . $parameter . '%')
                        ->orWhere('logs.ip', 'like', '%' . $parameter . '%');
                    })
                    ->select('Logs.*')
                    ->get()->load('user');
                return view('admin.logs.listado', ['logs' => $logs]);
            }
        } catch (\Exception $ex) {
            return view('error', ['code' => 500, 'message' => $ex->getMessage()]);
        }
    }
}
