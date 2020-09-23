<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class host extends Model
{
    public  function  schedules()
    {
        return $this->hasMany(schedule::class);
    }
    public  function office()
    {
        return $this->belongsTo(office::class);
    }

}
