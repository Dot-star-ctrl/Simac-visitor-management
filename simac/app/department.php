<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    //
    public  function company()
    {
        return $this->belongsTo(company::class);
    }
    public  function building()
    {
        return $this->belongsTo(building::class);
    }
    public  function  schedules()
    {
        return $this->hasMany(schedule::class);
    }
    public  function  visit_requests()
    {
        return $this->hasMany(visit_request::class);
    }
    public  function  Welcome_messages()
    {
        return $this->hasMany(Welcome_message::class);
    }



}
