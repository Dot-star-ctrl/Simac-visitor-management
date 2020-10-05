<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Building;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;
/**
 * @OA\Tag(
 *     name="Account",
 *     description="API Endpoints of Account Controller"
 * )
 */
class BuildingController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/buildings",
     *     @OA\Response(response="default", description="information about the building (name and address)")
     * )
     */
    public function show(Building $building) : GeneralResource
    {
        return new GeneralResource($building);
    }

    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(Building::paginate());
    }

    public function store(Request $request)
    {
        $request -> validate([
            'name'       => 'required',
            'adress'         => 'required',
        ]);

        $building = Building::create($request ->all());

        return new GeneralResource($building);
    }

    public function update(Building $building, Request $request) : GeneralResource
    {
        $building -> update($request -> all());

        return new GeneralResource($building);
    }

    public function destroy(Building $building)
    {
        $building -> delete();

        return response() -> json();
    }
}
