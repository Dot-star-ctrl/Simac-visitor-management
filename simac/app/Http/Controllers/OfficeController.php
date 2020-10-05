<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Office;
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
    public function show(Office $office) : GeneralResource
    {
        return new GeneralResource($office);
    }

    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(Office::paginate());
    }

    public function store(Request $request)
    {
        $request -> validate([
            'company_id'       => 'required',
            'building_id'         => 'required',
        ]);

        $office = Office::create($request ->all());

        return new GeneralResource($office);
    }

    public function update(Office $office, Request $request) : GeneralResource
    {
        $office -> update($request -> all());

        return new GeneralResource($office);
    }

    public function destroy(Office $office)
    {
        $office -> delete();

        return response() -> json();
    }
}
