<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Welcome_message extends Model
{
    //

    public  function department()
    {
        return $this->belongsTo(department::class);
    }
    public  function company()
    {
        return $this->belongsTo(company::class);
    }
}
