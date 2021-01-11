<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Host extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'office_id',
    ];
    public  function  schedules()
    {
        return $this->hasMany(Schedule::class);
    }
    public  function  host_attendings()
    {
        return $this->hasMany(HostAttending::class);
    }
    public  function office()
    {
        return $this->belongsTo(Office::class);
    }
    public  function  visit_requests()
    {
        return $this->hasMany(VisitRequest::class);
    }
}
