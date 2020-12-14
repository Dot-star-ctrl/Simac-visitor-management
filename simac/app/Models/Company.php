<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
    ];
    public  function  employees()
    {
        return $this->hasMany(Employee::class);
    }
    public  function  offices()
    {
        return $this->hasMany(Office::class);
    }
    public  function  schedules()
    {
        return $this->hasMany(Schedule::class);
    }
    public  function  Welcome_messages()
    {
        return $this->hasMany(WelcomeMessage::class);
    }
    public  function  departments()
    {
        return $this->hasMany(Department::class);
    }
    public  function  visit_requests()
    {
        return $this->hasMany(VisitRequest::class);
    }

}
