<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'token',
    ];
    public  function  account()
    {
        return $this->hasOne(Account::class);
    }
    public  function  checkin()
    {
        return $this->hasOne(Checkin::class);
    }
    public  function  checkout()
    {
        return $this->hasOne(Checkout::class);
    }

    public  function  visit_requests()
    {
        return $this->hasMany(VisitRequest::class);
    }
    public  function  qrcodes()
    {
        return $this->hasMany(QRcode::class);
    }


    public  function  schedules()
    {
        return $this->belongsToMany('App/Schedule','Attendance');
    }
}
