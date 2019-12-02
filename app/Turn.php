<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turn extends Model
{
    protected $fillable = ['turn_id', 'appointment_id', 'created_at'];
    use SoftDeletes;

    public function patient()
    {
        return $this->belongsTo('App\Patient', 'patient_id', 'id');
    }

    public function appointment()
    {
        return $this->belongsTo('App\Appointment', 'appointment_id', 'id');
    }
}
