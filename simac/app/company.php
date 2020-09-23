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
}
