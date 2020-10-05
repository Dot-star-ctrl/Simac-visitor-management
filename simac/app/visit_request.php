<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visit_request extends Model
{
    //
    public  function visitor()
    {
        return $this->belongsTo(visitor::class);
    }
    public  function host()
    {
        return $this->belongsTo(host::class);
    }
    public  function company()
    {
        return $this->belongsTo(company::class);
    }
    public  function department()
    {
        return $this->belongsTo(department::class);
    }

}
