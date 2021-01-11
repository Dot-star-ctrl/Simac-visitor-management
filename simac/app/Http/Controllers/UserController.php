<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Fortify\CreateNewUser;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;
use App\Models\Employee;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $man = new CreateNewUser();
        $user = $man->create($request->all());

        $employee = Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'user_id' => $user->id,
            'company_id' => $request->company_id,
            'department_id' => isset($request->department_id) ? $request->deparment_id : NULL,
        ]);

        return new GeneralResource($employee);
    }
}
