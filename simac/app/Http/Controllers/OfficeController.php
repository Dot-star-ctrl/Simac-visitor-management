<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Office;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;
/**
 * @OA\Tag(
 *     name="Office",
 *     description="API Endpoints of Office Controller"
 * )
 */
class OfficeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/offices/{officeId}",
     *     @OA\Response(response="default", description="information about the office (compnany id, building id)")
     * )
     */
    public function show(Office $office) : GeneralResource
    {
        return new GeneralResource($office);
    }
    /**
     * @OA\Get(
     *     path="/api/offices",
     *     @OA\Response(response="default", description="information about all the offices (compnany id, building id)")
     * )
     */
    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(Office::paginate());
    }
    /**
     * @OA\Post(
     *     path="/api/offices",
     *     @OA\Response(response="default", description="information about the created office (compnany id, building id)")
     * )
     */
    public function store(Request $request)
    {
        $request -> validate([
            'company_id'       => 'required',
            'building_id'      => 'required',
        ]);

        $office = Office::create($request ->all());

        return new GeneralResource($office);
    }
    /**
     * @OA\Put(
     *     path="/api/offices/{officeId}",
     *     @OA\Response(response="default", description="updated information about the selected office (compnany id, building id)")
     * )
     */
    public function update(Office $office, Request $request) : GeneralResource
    {
        $office -> update($request -> all());

        return new GeneralResource($office);
    }
    /**
     * @OA\Delete(
     *     path="/api/offices/{officeId}",
     *     @OA\Response(response="default", description="empty array")
     * )
     */
    public function destroy(Office $office)
    {
        $office -> delete();

        return response() -> json();
    }
}
