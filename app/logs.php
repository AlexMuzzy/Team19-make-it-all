<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class logs extends Model
{
    protected $fillable = [
        'caseid',
    	'caller',
    	'operator',
    	'hardwareSN',
    	'OS',
    	'software',
        'reason'
    ];

    public function setOSAttribute($value)
    {
            $this->attributes['OS'] = ($value!='')?($value=$value):
            ($value='N/A');
    }

    public function setsoftwareAttribute($value)
    {
            $this->attributes['software'] = ($value!='')?($value=$value):
            ($value='N/A');
    }
}
