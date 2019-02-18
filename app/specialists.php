<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class specialists extends Model
{
    protected $fillable = [
        'employeeid',
        'hardwareExpert',
        'softwareExpert',
        'networkExpert',
        'assignedCases',
        'solvedCases'
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function employee()
    {
        return $this->hasOne('App\employees');
    }

    public function setHardwareExpertAttribute($value)
    {
            $this->attributes['hardwareExpert'] = ($value=='Yes')?($value=1):
            ($value=0);
    }
    public function setSoftwareExpertAttribute($value)
    {
            $this->attributes['softwareExpert'] = ($value=='Yes')?($value=1):
            ($value=0);
    }
    public function setNetworkExpertAttribute($value)
    {
            $this->attributes['networkExpert'] = ($value=='Yes')?($value=1):
            ($value=0);
    }
}
