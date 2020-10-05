<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class host extends Model
{
    public  function  schedules()
    {
        return $this->hasMany(schedule::class);
    }
    public  function  host_attendings()
    {
        return $this->hasMany(host_attending::class);
    }
    public  function office()
    {
        return $this->belongsTo(office::class);
    }
    public  function  visit_requests()
    {
        return $this->hasMany(visit_request::class);
    }

}
