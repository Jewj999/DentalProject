<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    public function services()
    {
        return $this->belongsToMany('App\Service', 'detail_consultation_services', 'consultation_id', 'service_id');
    }
}
