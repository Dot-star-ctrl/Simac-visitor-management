<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Checking extends Model
{

    use HasFactory;

    protected $fillable = [
        'visitor_id',
        'dateTime',
        'building_id',
    ];

    public  function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
    public  function building()
    {
        return $this->belongsTo(Building::class);
    }
}
