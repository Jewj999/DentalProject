<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turn extends Model
{
    use SoftDeletes;
    
    public function patient()
    {
        return $this->belongsTo('App\Patient', 'patient_id', 'id');
    }
}
