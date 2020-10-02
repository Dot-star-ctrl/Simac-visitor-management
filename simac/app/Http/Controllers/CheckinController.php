<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkin;
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
    public function show(Checkin $checkin) : GeneralResource
    {
        return new GeneralResource($checkin);
    }

    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(Checkin::paginate());
    }

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

    public function update(Checkin $checkin, Request $request) : GeneralResource
    {
        $checkin -> update($request -> all());

        return new GeneralResource($checkin);
    }

    public function destroy(Checkin $checkin)
    {
        $checkin -> delete();

        return response() -> json();
    }
}
