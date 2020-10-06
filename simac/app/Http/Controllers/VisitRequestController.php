<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;
use App\VisitRequest;
use Illuminate\Http\Request;

class VisitRequestController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/visitrequests/{visitrequestId}",
     *     @OA\Response(response="default", description="information about the visitrequest (visitor id, company id, department id, date and time)")
     * )
     */
    public function show(VisitRequest $visitRequest) : GeneralResource
    {
        return new GeneralResource($visitRequest);
    }
    /**
     * @OA\Get(
     *     path="/api/visitrequests",
     *     @OA\Response(response="default", description="information about all the visitrequest (visitor id, company id, department id, date and time)")
     * )
     */
    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(VisitRequest::paginate());
    }
    /**
     * @OA\Post(
     *     path="/api/visitrequests",
     *     @OA\Response(response="default", description="information about the created visitrequest (visitor id, company id, department id, date and time)")
     * )
     */
    public function store(Request $request)
    {
        $request -> validate([
            'visitor_id'     => 'required',
            'company_id'     => 'required',
            'department_id'  => 'required',
            'dateTime'       => 'required',
        ]);

        $visitRequest = VisitRequest::create($request ->all());

        return new GeneralResource($visitRequest);
    }
    /**
     * @OA\Put(
     *     path="/api/visitrequests/{visitrequestId}",
     *     @OA\Response(response="default", description="updated information about the visitrequest (visitor id, company id, department id, date and time)")
     * )
     */
    public function update(VisitRequest $visitRequest, Request $request) : GeneralResource
    {
        $visitRequest -> update($request -> all());

        return new GeneralResource($visitRequest);
    }
    /**
     * @OA\Delete(
     *     path="/api/visitrequests/{visitrequestId}",
     *     @OA\Response(response="default", description="empty array")
     * )
     */
    public function destroy(VisitRequest $visitRequest)
    {
        $visitRequest -> delete();

        return response() -> json();
    }
}
