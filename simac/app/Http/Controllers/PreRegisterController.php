<?php

namespace App\Http\Controllers;

use App\Department;
use App\Company;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;
use Illuminate\Http\Request;

class PreRegisterController extends Controller
{
    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(Department::paginate());
    }

    public function show($id): GeneralResourceCollection
    {
        $departments = Department::all();

        $departments = $departments->Where('company_id', $id);

        return new GeneralResourceCollection($departments);
    }

    public function store(Request $request)
    {
        $request -> validate([
            'visitor_id' => 'required',
            'company_id'       => 'required',
            'department_id'       => 'required',
            'dateTime' => 'required',
        ]);

        $visitRequest = VisitRequest::create($request ->all());

        return new GeneralResource($visitRequest);
    }
}
