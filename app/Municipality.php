<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    public function dpto()
    {
        return $this->belongsTo('App\Department', 'department_id', 'id');
    }
}
