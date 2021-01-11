<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostAttending extends Model
{


    public  function host()
    {
        return $this->belongsTo(Host::class);
    }
    public  function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
