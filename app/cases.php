<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cases extends Model
{
    //
    protected $fillable = [
        'fname',
        'sname',
        'category',
        'issue',
        'priority',
        'summary',
        'solved'
    ];

    public function setSolvedAttribute($value)
    {
            $this->attributes['solved'] = ($value=='Yes')?($value=1):
            ($value=0);
    }
}
