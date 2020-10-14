<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Office extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'company_id',
        'building_id',
    ];
    public  function company()
    {
        return $this->belongsTo(Company::class);
    }
    public  function building()
    {
        return $this->belongsTo(Building::class);
    }
    public  function  hosts()
    {
        return $this->hasMany(Host::class);
    }
    public  function  schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
