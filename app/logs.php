<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class logs extends Model
{
    protected $fillable = [
    	'caller',
    	'operator',
    	'dateTime',
    	'hardwareSN',
    	'OS',
    	'software'
    ];

    public function setOSAttribute($value)
    {
            $this->attributes['OS'] = ($value!='')?($value=$value):
            ($value='');
    }

    public function setsoftwareAttribute($value)
    {
            $this->attributes['software'] = ($value!='')?($value=$value):
            ($value='');
    }
}
