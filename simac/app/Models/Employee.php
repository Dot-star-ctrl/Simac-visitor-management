<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'user_id',
        'company_id',
        'department_id',
    ];

    protected $hidden = [
        'password',
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
