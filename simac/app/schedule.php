<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    public  function host()
    {
        return $this->belongsTo(host::class);
    }
    public  function office()
    {
        return $this->belongsTo(office::class);
    }
    public  function  qrcodes()
    {
        return $this->hasMany(qrcode::class);
    }
}
