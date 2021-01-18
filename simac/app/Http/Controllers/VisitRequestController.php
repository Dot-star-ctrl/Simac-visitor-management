<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;
use App\Models\VisitRequest;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function index() : GeneralResource
    {
        $key = (isset($_GET["key"])) ? $_GET["key"] : "up";

        $visit_requests = DB::table('visitors')
            ->join('visit_requests', 'visit_requests.visitor_id', '=', 'visitors.id')
            ->select('visit_requests.*', 'visitors.first_name', 'visitors.last_name')
            ->where('visit_requests.host_id', '=', NULL)
            ->when($key, function($query, $key) {
                switch($key) {
                    case "up":
                        return $query->latest('proposed_start_dateTime');
                    case "new":
                        return $query->latest('created_at');
                    case "old":
                        return $query->oldest('created_at');
                }
            })
            ->paginate(10);

        return new GeneralResource($visit_requests);
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
            'note',
            'proposed_start_dateTime'       => 'required',
            'proposed_end_dateTime'       => 'required',
        ]);

        $visitRequest = VisitRequest::create($request->all());

        return new GeneralResource($visitRequest);
    }
    /**
     * @OA\Put(
     *     path="/api/visitrequests/{visitrequestId}",
     *     @OA\Response(response="default", description="updated information about the visitrequest (visitor id, company id, department id, date and time)")
     * )
     */
    public function update($req_id, Request $request)
    {
        $host_id = $request->id;
        
        DB::table('visit_requests')
            ->where('id', '=', $req_id)
            ->update(['host_id' => $host_id]);

        return response()->noContent();
    }
    /**
     * @OA\Delete(
     *     path="/api/visitrequests/{visitrequestId}",
     *     @OA\Response(response="default", description="empty array")
     * )
     */
    public function destroy($id)
    {
        DB::table('visit_requests')
            ->where('id', '=', $id)
            ->delete();

        return response()->noContent();
    }

    public function getUser($visitor_id)
    {
        $visitreq = VisitRequest::where("visitor_id", $visitor_id)->get();

        return $visitreq;
    }

    public function deleteUserVisit($visitor_id)
    {
        $visitreq = VisitRequest::where("visitor_id", $visitor_id)->delete();

        return true;
    }
}
