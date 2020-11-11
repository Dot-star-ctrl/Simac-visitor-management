<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;

/**
 * @OA\Tag(
 *     name="Employee",
 *     description="API Endpoints of Employee Controller"
 * )
 */
class EmployeeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/employees/{employeeId}",
     *     @OA\Response(response="default", description="information about the selected employee (f name, l name, email, username, password, company)")
     * )
     */
    public function show(Employee $employee) : GeneralResource
    {
        return new GeneralResource($employee);
    }
    /**
     * @OA\Get(
     *     path="/api/employees",
     *     @OA\Response(response="default", description="information about all the employees (f name, l name, email, username, password, company)")
     * )
     */
    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(Employee::paginate());
    }
    /**
     * @OA\Post(
     *     path="/api/employees",
     *     @OA\Response(response="default", description="information about the created employee (f name, l name, email, username, password, company)")
     * )
     */
    public function store(Request $request)
    {
        $request -> validate([
            'first_name'  => 'required',
            'last_name'   => 'required',
            'email'       => 'required',
            'username'    => 'required',
            'password'    => 'required',
            'company'     => 'required',
        ]);

        $employee = Employee::create($request ->all());

        return new GeneralResource($employee);
    }
    /**
     * @OA\Put(
     *     path="/api/employees/{employeeId}",
     *     @OA\Response(response="default", description="updated information about the selected employee (f name, l name, email, username, password, company)")
     * )
     */
    public function update(Employee $employee, Request $request) : GeneralResource
    {
        $employee -> update($request -> all());

        return new GeneralResource($employee);
    }
    /**
     * @OA\Delete(
     *     path="/api/employees/{employeeId}",
     *     @OA\Response(response="default", description="empty array")
     * )
     */
    public function destroy(Employee $employee)
    {
        $employee -> delete();

        return response() -> json();
    }
}
