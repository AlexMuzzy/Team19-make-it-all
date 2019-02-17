<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class software extends Model
{
    protected $fillable = [
        'vendor',
        'software',
        'supported',
        'licensed'
    ];

    public function setsupportedAttribute($value)
    {
            $this->attributes['supported'] = ($value=='Yes')?($value=1):
            ($value=0);
    }

    public function setlicensedAttribute($value)
    {
            $this->attributes['licensed'] = ($value=='Yes')?($value=1):
            ($value=0);
    }
}
