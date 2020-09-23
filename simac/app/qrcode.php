<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class qrcode extends Model
{
    public  function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
    public  function schedule()
    {
        return $this->belongsTo(schedule::class);
    }
}
