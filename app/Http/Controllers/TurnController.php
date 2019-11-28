<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Patient;
use App\Turn;
use Illuminate\Http\Request;

class TurnController extends Controller
{
    public function index()
    {
        $turns = Turn::all()->load('patient');
    }
}
