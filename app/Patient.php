<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Patient extends Model
{
    use Sortable;
    public $sortable = ['name', 'apellido'];

    protected $table = "patients";

    public function gender()
    {
        return $this->belongsTo('App\Sexe', 'sex_id', 'id');
    }
}
