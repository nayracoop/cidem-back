<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //

    public function filters()
    {
        return $this->belongsToMany('App\Filter', 'filters_services', 'service_id', 'filter_id');
    }
}
