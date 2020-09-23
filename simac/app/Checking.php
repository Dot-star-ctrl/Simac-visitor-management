<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checking extends Model
{
    protected $fillable = [
        'visitor_id',
        'dateTime',
        'building_id',
    ];
}
