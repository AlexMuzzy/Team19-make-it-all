<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    protected $fillable = [
        'fname',
        'sname',
        'jobTitle',
        'department',
        'telephone'
    ];
}
