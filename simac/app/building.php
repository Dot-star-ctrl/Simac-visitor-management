<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class building extends Model
{
    public  function  offices()
    {
        return $this->hasMany(office::class);
    }
    public  function  checkins()
    {
        return $this->hasMany(checkin::class);
    }
    public  function  checkouts()
    {
        return $this->hasMany(checkout::class);
    }
}
