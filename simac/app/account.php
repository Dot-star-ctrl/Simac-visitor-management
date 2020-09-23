<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    public  function visitor()
    {
        return $this->belongsTo(visitor::class);
    }
}
