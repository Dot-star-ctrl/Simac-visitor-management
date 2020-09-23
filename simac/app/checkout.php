<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class checkout extends Model
{
    public  function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
    public  function building()
    {
        return $this->belongsTo(building::class);
    }
}
