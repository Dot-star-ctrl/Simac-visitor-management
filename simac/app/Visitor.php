<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    //
    public  function  account()
    {
        return $this->hasOne(account::class);
    }
    public  function  checkin()
    {
        return $this->hasOne(checkin::class);
    }
    public  function  checkout()
    {
        return $this->hasOne(checkout::class);
    }

    public  function  visit_requests()
    {
        return $this->hasMany(visit_request::class);
    }
    public  function  qrcodes()
    {
        return $this->hasMany(qrcode::class);
    }


    public  function  schedules()
    {
        return $this->belongsToMany('App/schedule','Attendance');
    }

}
