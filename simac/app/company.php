<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    public  function  employees()
    {
        return $this->hasMany(employee::class);
    }
    public  function  offices()
    {
        return $this->hasMany(office::class);
    }
    public  function  schedules()
    {
        return $this->hasMany(schedule::class);
    }
    public  function  Welcome_messages()
    {
        return $this->hasMany(Welcome_message::class);
    }
    public  function  departments()
{
    return $this->hasMany(department::class);
}
    public  function  visit_requests()
    {
        return $this->hasMany(visit_request::class);
    }

}
