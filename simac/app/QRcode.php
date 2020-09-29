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
}
