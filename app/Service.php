<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Service extends Model
{
    use Sortable;
    public $sortable = ['name', 'price'];

    protected $table = "services";
}
