<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WelcomeMessage extends Model
{

    public  function department()
    {
        return $this->belongsTo(Department::class);
    }
    public  function company()
    {
        return $this->belongsTo(Company::class);
    }
}
