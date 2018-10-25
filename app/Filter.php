<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Filter extends Model
{
    protected $fillable = ['name', 'slug', 'tag', 'summary', 'description', 'filter_type_id'];

    use SoftDeletes;
    //
    public function filterType()
    {
        return $this->belongsTo('App\FilterType', 'filter_type_id');
    }

    public function services()
    {
        return $this->belongsToMany('App\Service', 'filters_services', 'filter_id', 'service_id');
    }
}
