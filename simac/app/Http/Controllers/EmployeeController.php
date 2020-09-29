<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;

class EmployeeController extends Controller
{
    public function show(Employee $employee) : GeneralResource
    {
        return new GeneralResource($employee);
    }

    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(Employee::paginate());
    }

    public function store(Request $request)
    {
        $request -> validate([
            'first_name'       => 'required',
            'last_name'         => 'required',
            'email'      => 'required',
            'username'      => 'required',
            'password'      => 'required',
            'company'      => 'required',
        ]);

        $employee = Employee::create($request ->all());

        return new GeneralResource($employee);
    }

    public function update(Employee $employee, Request $request) : GeneralResource
    {
        $employee -> update($request -> all());

        return new GeneralResource($employee);
    }

    public function destroy(Employee $employee)
    {
        $employee -> delete();

        return response() -> json();
    }
}
