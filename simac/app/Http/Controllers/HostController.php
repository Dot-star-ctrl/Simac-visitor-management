<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Host;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;
use Illuminate\Support\Facades\DB;
/**
 * @OA\Tag(
 *     name="Host",
 *     description="API Endpoints of Host Controller"
 * )
 */
class HostController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/buildings",
     *     @OA\Response(response="default", description="information about the building (name and address)")
     * )
     */
    public function show(Host $host) : GeneralResource
    {
        return new GeneralResource($host);
    }

    public function index() : GeneralResource
    {
        // $visit_requests = DB::table('visitors')
        //     ->join('visit_requests', 'visit_requests.visitor_id', '=', 'visitors.id')
        //     ->select('visit_requests.*', 'visitors.*')
        //     ->get();

        // return new GeneralResource($visit_requests);

        if (isset($_GET['cid'])) {
            $company_id = $_GET['cid'];

            $hosts = DB::table('offices')
                ->join('companies', 'offices.company_id', '=', 'companies.id')
                ->join('hosts', 'offices.id', '=', 'hosts.office_id')
                ->select('hosts.*', 'offices.*')
                ->where('companies.id', '=', $company_id)
                ->get();

            return new GeneralResource($hosts);
        }

        return new GeneralResource(Host::paginate());
    }

    public function store(Request $request)
    {
        $request -> validate([
            'first_name'       => 'required',
            'last_name'         => 'required',
            'email'      => 'required',
            'office_id'      => 'required',
        ]);

        $host = Host::create($request ->all());

        return new GeneralResource($host);
    }

    public function update(Host $host, Request $request) : GeneralResource
    {
        $host -> update($request -> all());

        return new GeneralResource($host);
    }

    public function destroy(Host $host)
    {
        $host -> delete();

        return response() -> json();
    }
}
