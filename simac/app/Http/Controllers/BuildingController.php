<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Building;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;
/**
 * @OA\Tag(
 *     name="Building",
 *     description="API Endpoints of Building Controller"
 * )
 */
class BuildingController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/buildings{buildingId}",
     *     @OA\Response(response="default", description="information about the building (name and address)")
     * )
     */
    public function show(Building $building) : GeneralResource
    {
        return new GeneralResource($building);
    }
    /**
     * @OA\Get(
     *     path="/api/buildings",
     *     @OA\Response(response="default", description="information about all the buildings (name and address)")
     * )
     */
    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(Building::paginate());
    }
    /**
     * @OA\Put(
     *     path="/api/buildings",
     *     @OA\Response(response="default", description="information about the newly created building (name and address)")
     * )
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name'    => 'required',
            'adress'  => 'required',
        ]);

        $building = Building::create($request ->all());

        return new GeneralResource($building);
    }
    /**
     * @OA\Put(
     *     path="/api/buildings{buildingId}",
     *     @OA\Response(response="default", description="updated information about the building (name and address)")
     * )
     */
    public function update(Building $building, Request $request) : GeneralResource
    {
        $building -> update($request -> all());

        return new GeneralResource($building);
    }
    /**
     * @OA\Delete(
     *     path="/api/buildings",
     *     @OA\Response(response="default", description="empty array")
     * )
     */
    public function destroy(Building $building)
    {
        $building -> delete();

        return response() -> json();
    }
}
