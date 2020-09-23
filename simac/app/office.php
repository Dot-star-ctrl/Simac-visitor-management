<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class office extends Model
{
    public  function company()
    {
        return $this->belongsTo(company::class);
    }
    public  function building()
    {
        return $this->belongsTo(building::class);
    }
    public  function  hosts()
    {
        return $this->hasMany(host::class);
    }
    public  function  schedules()
    {
        return $this->hasMany(schedule::class);
    }
}
