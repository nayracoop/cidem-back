<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    //
    use SoftDeletes;

    public function filters()
    {
        return $this->belongsToMany('App\Filter', 'filters_services', 'service_id', 'filter_id');
    }
}
