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
        if (isset($_GET['cid'])) {
            $company_id = $_GET['cid'];

            $hosts = DB::table('hosts')
                ->where('company_id', '=', $company_id)
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
