<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkin;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;
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
    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(Checkin::paginate());
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
