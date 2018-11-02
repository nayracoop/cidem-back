<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = ['name', 'institution', 'email', 'description', 'status'];

   
}
