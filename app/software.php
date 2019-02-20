<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class software extends Model
{
    protected $fillable = [
        'software',
        'supported',
        'licensed',
        'vendor'
    ];
}
