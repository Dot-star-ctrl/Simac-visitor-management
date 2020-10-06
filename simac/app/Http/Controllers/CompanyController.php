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
    /**
     * @OA\Get(
     *     path="/api/companies/{companyId}",
     *     @OA\Response(response="default", description="information about the selected company (name)")
     * )
     */
    public function show(Company $company) : GeneralResource
    {
        return new GeneralResource($company);
    }
    /**
     * @OA\Get(
     *     path="/api/companies",
     *     @OA\Response(response="default", description="information about all the companies (name)")
     * )
     */
    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(Company::paginate());
    }
    /**
     * @OA\Post(
     *     path="/api/companies",
     *     @OA\Response(response="default", description="information about the new company (name)")
     * )
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name'  => 'required',
        ]);

        $company = Company::create($request ->all());

        return new GeneralResource($company);
    }
    /**
     * @OA\Put(
     *     path="/api/companies/{companyId}",
     *     @OA\Response(response="default", description="updated information about the selected company (name)")
     * )
     */
    public function update(Company $company, Request $request) : GeneralResource
    {
        $company -> update($request -> all());

        return new GeneralResource($company);
    }
    /**
     * @OA\Delete(
     *     path="/api/companies/{companyId}",
     *     @OA\Response(response="default", description="empty array")
     * )
     */
    public function destroy(Company $company)
    {
        $company -> delete();

        return response() -> json();
    }
}
