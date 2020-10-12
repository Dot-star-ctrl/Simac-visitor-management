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

    public function show($companyId): GeneralResourceCollection
    {
        $departments = Department::all();

        $departments = $departments->Where('company_id', $companyId);

        return new GeneralResourceCollection($departments);
    }
}
