<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'visitor_id',
        'password',
    ];
    public  function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
}
