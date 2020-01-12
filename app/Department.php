<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $table = "departments";

    public function muns()
    {
        return $this->hasMany('App\Municipality', 'department_id', 'id');
    }
}
