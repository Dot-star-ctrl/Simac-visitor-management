<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function show(Department $department) : GeneralResource
    {
        return new GeneralResource($department);
    }

    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(Department::paginate());
    }

    public function store(Request $request)
    {
        $request -> validate([
            'company_id'       => 'required',
            'building_id'       => 'required',
            'department_name'       => 'required',
        ]);

        $department = Department::create($request ->all());

        return new GeneralResource($department);
    }

    public function update(Department $department, Request $request) : GeneralResource
    {
        $department -> update($request -> all());

        return new GeneralResource($department);
    }

    public function destroy(Department $department)
    {
        $department -> delete();

        return response() -> json();
    }
}
