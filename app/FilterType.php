<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FilterType extends Model
{
    use SoftDeletes;
    //
    public function filters()
    {
        return  $this->hasMany('App\Filter');
    }
}
