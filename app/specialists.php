<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class specialists extends Model
{
    protected $fillable = [
        'employeeID',
        'hardwareExpert',
        'softwareExpert',
        'networkExpert',
        'assignedCases',
        'solvedCases'
    ];
}
