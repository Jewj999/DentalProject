<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Service extends Model
{
    use Sortable;
    public $sortable = ['name'];

    protected $table = "services";
}
