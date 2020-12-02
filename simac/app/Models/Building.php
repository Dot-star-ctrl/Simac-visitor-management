<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Building extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'address',
    ];
    public  function  offices()
    {
        return $this->hasMany(Office::class);
    }
    public  function  checkins()
    {
        return $this->hasMany(Checkin::class);
    }
    public  function  checkouts()
    {
        return $this->hasMany(Checkout::class);
    }
    public  function  departments()
    {
        return $this->hasMany(Department::class);
    }
}
