<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Fortify\CreateNewUser;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;
use App\Employee;

class UserController extends Controller
{
    // api/users
    public function store(Request $request)
    {
        //create user account
        $man = new CreateNewUser();
        $user = $man->create($request->all());

        //create an employee record in db
        $employee = Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'user_id' => $user->id,
            'company_id' => $request->company_id,
            'department_id' => $request->department_id,
        ]);

        return new GeneralResource($employee);
    }
}
