<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{

    use HasFactory;

    protected $fillable = [
        'visitor_id',
        'password',
    ];
    public  function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
}
