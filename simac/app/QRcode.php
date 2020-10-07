<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QRcode extends Model
{
    protected $fillable = [
        'code',
        'visitor_id',
        'schedule_id',
    ];
    public  function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
    public  function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
