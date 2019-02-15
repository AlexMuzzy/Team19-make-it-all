<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class software extends Model
{
    protected $fillable = [
        'software',
        'supported',
        'licensed'
    ];

    public function setsupportedAttribute($value)
    {
            $this->attributes['software'] = ($value=='Yes')?($value=1):
            ($value=0);
    }

    public function setlicensedAttribute($value)
    {
            $this->attributes['licenseds'] = ($value=='Yes')?($value=1):
            ($value=0);
    }
}
