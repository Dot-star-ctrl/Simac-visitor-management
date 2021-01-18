<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkin;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;
use Illuminate\Support\Facades\DB;
/**
 * @OA\Tag(
 *     name="Checkin",
 *     description="API Endpoints of Checkin Controller"
 * )
 */
class CheckinController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/checkin/{checkinId}",
     *     @OA\Response(response="default", description="information about the checkin (visitor id, date and time, building id)")
     * )
     */
    public function show(Checkin $checkin) : GeneralResource
    {
        return new GeneralResource($checkin);
    }
        /**
     * @OA\Get(
     *     path="/api/checkin",
     *     @OA\Response(response="default", description="information about all the checkins (visitor id, date and time, building id)")
     * )
     */
    public function index()
    {
        if (isset($_GET['s'])) {
            $sort = $_GET['s'];

            $startDate = new \DateTime();
            $startDate = $startDate->modify("-$sort day")->format("Y-m-d");

            $endDate = new \DateTime();
            $endDate = $endDate->format("Y-m-d");

            $checkins = DB::table('checkins')
                ->whereBetween('dateTime', [$startDate, $endDate])
                ->join('visitors', 'checkins.visitor_id', '=', 'visitors.id')
                ->join('buildings', 'checkins.building_id', '=', 'buildings.id')
                ->select('checkins.dateTime', 'visitors.first_name', 'visitors.last_name', 'buildings.name')
                ->oldest('dateTime')
                ->paginate(15);

            return $checkins;
        } else if (isset($_GET['sd']) && isset($_GET['ed'])) {
            $startDate = new \DateTime($_GET['sd']);
            $startDate = $startDate->format("Y-m-d");

            $endDate = new \DateTime($_GET['ed']);
            $endDate = $endDate->format("Y-m-d");

            $checkins = DB::table('checkins')
                ->whereBetween('dateTime', [$startDate, $endDate])
                ->join('visitors', 'checkins.visitor_id', '=', 'visitors.id')
                ->join('buildings', 'checkins.building_id', '=', 'buildings.id')
                ->select('checkins.dateTime', 'visitors.first_name', 'visitors.last_name', 'buildings.name')
                ->oldest('dateTime')
                ->paginate(15);

            return $checkins;
        } else {
            return new GeneralResourceCollection(Checkin::paginate());
        }
    }
    /**
     * @OA\Post(
     *     path="/api/buildings",
     *     @OA\Response(response="default", description="information about the created checkin (visitor id, date and time, building id)")
     * )
     */
    public function store(Request $request)
    {
        $request -> validate([
            'visitor_id'       => 'required',
            'dateTime'         => 'required',
            'building_id'      => 'required',
        ]);

        $checkin = Checkin::create($request ->all());

        return new GeneralResource($checkin);
    }
    /**
     * @OA\Put(
     *     path="/api/checkin/{checkinId}",
     *     @OA\Response(response="default", description="information about the updated checkin (visitor id, date and time, building id)")
     * )
     */
    public function update(Checkin $checkin, Request $request) : GeneralResource
    {
        $checkin -> update($request -> all());

        return new GeneralResource($checkin);
    }
    /**
     * @OA\Delete(
     *     path="/api/buildings",
     *     @OA\Response(response="default", description="empty array")
     * )
     */
    public function destroy(Checkin $checkin)
    {
        $checkin -> delete();

        return response() -> json();
    }
}