<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QRcode extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'floor',
        'office',
        'phone',
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
