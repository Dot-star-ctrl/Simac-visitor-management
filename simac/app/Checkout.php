<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Checking;

class Checkout extends Checking
{
    public  function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
    public  function building()
    {
        return $this->belongsTo(Building::class);
    }
}
