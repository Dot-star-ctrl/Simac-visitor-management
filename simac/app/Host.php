<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Host extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'office_id',
    ];
}
