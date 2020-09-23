<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'host_id',
        'dateTime',
        'office_id',
        'host_message',
        'accepted',
    ];
}
