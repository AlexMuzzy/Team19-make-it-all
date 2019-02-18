<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cases extends Model
{
    //
    protected $fillable = [
        'employeeID',
        'fname',
        'sname',
        'category',
        'issue',
        'priority',
        'summary',
        'solved',
        'assignedTo',
        'solvedtext'
    ];

    public function setSolvedAttribute($value)
    {
            $this->attributes['solved'] = ($value=='Yes')?($value=1):
            ($value=0);
    }
    public function setSolvedtextAttribute($value)
    {
            $this->attributes['solvedtext'] = ($value!='')?($value=$value):
            ($value='');
    }
}
