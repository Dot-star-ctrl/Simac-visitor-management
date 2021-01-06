<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'host_id',
        'visitor_id',
        'company_id',
        'department_id',
        'dateTime',
        'office_id',
        'floor',
        'phone',
        'host_message',
    ];
    public  function host()
    {
        return $this->belongsTo(Host::class);
    }
    public  function office()
    {
        return $this->belongsTo(Office::class);
    }
    public  function department()
    {
        return $this->belongsTo(Department::class);
    }
    public  function company()
    {
        return $this->belongsTo(Company::class);
    }


    public  function  qrcodes()
    {
        return $this->hasMany(QRcode::class);
    }
    public  function  host_attendings()
    {
        return $this->hasMany(HostAttending::class);
    }

    public  function  visitors()
    {
        return $this->belongsToMany('App/Visitor','Attendance');
    }
}
