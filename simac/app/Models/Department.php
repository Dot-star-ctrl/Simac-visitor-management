<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'building_id',
        'department_name',
    ];
    public  function company()
    {
        return $this->belongsTo(Company::class);
    }
    public  function building()
    {
        return $this->belongsTo(Building::class);
    }
    public  function  schedules()
    {
        return $this->hasMany(Schedule::class);
    }
    public  function  visit_requests()
    {
        return $this->hasMany(VisitRequest::class);
    }
    public  function  Welcome_messages()
    {
        return $this->hasMany(WelcomeMessage::class);
    }

}
