<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/departments/{departmentId}",
     *     @OA\Response(response="default", description="information about the department (company id, building id and department name)")
     * )
     */
    public function show(Department $department) : GeneralResource
    {
        return new GeneralResource($department);
    }
    /**
     * @OA\Get(
     *     path="/api/departments",
     *     @OA\Response(response="default", description="information about all the departments (company id, building id and department name)")
     * )
     */
    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(Department::paginate());
    }
    /**
     * @OA\Post(
     *     path="/api/departments",
     *     @OA\Response(response="default", description="information about the created department (company id, building id and department name)")
     * )
     */
    public function store(Request $request)
    {
        $request -> validate([
            'company_id'       => 'required',
            'building_id'      => 'required',
            'department_name'  => 'required',
        ]);

        $department = Department::create($request ->all());

        return new GeneralResource($department);
    }
    /**
     * @OA\Put(
     *     path="/api/departments/{departmentId}",
     *     @OA\Response(response="default", description="updated information about the department (company id, building id and department name)")
     * )
     */
    public function update(Department $department, Request $request) : GeneralResource
    {
        $department -> update($request -> all());

        return new GeneralResource($department);
    }
    /**
     * @OA\Delete(
     *     path="/api/departments/{departmentId}",
     *     @OA\Response(response="default", description="empty array")
     * )
     */
    public function destroy(Department $department)
    {
        $department -> delete();

        return response() -> json();
    }
}
