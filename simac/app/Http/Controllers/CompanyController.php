<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;
/**
 * @OA\Tag(
 *     name="Company",
 *     description="API Endpoints of Company Controller"
 * )
 */
class CompanyController extends Controller
{
    public function show(Company $company) : GeneralResource
    {
        return new GeneralResource($company);
    }

    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(Company::paginate());
    }

    public function store(Request $request)
    {
        $request -> validate([
            'name'       => 'required',
        ]);

        $company = Company::create($request ->all());

        return new GeneralResource($company);
    }

    public function update(Company $company, Request $request) : GeneralResource
    {
        $company -> update($request -> all());

        return new GeneralResource($company);
    }

    public function destroy(Company $company)
    {
        $company -> delete();

        return response() -> json();
    }
}
