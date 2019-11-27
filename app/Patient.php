<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = "patients";

    public function sex()
    {
        return $this->belongsTo('App\Sexe', 'sex_id', 'id');
    }
}
