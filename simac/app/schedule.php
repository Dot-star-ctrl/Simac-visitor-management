<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    public  function host()
    {
        return $this->belongsTo(host::class);
    }
    public  function office()
    {
        return $this->belongsTo(office::class);
    }
    public  function department()
    {
        return $this->belongsTo(department::class);
    }
    public  function company()
    {
        return $this->belongsTo(company::class);
    }


    public  function  qrcodes()
    {
        return $this->hasMany(qrcode::class);
    }
    public  function  host_attendings()
    {
        return $this->hasMany(host_attending::class);
    }

    public  function  visitors()
    {
        return $this->belongsToMany('App/Visitor','Attendance');
    }
}
