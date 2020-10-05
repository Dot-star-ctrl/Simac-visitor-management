<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class host_attending extends Model
{
    //
    public  function host()
    {
        return $this->belongsTo(host::class);
    }
    public  function schedule()
    {
        return $this->belongsTo(schedule::class);
    }
}
