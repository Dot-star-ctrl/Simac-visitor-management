<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;
use App\VisitRequest;
use Illuminate\Http\Request;

class VisitRequestController extends Controller
{
    public function show(VisitRequest $visitRequest) : GeneralResource
    {
        return new GeneralResource($visitRequest);
    }

    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(VisitRequest::paginate());
    }

    public function store(Request $request)
    {
        $request -> validate([
            'visitor_id' => 'required',
            'company_id'       => 'required',
            'department_id'       => 'required',
            'dateTime' => 'required',
        ]);

        $visitRequest = VisitRequest::create($request ->all());

        return new GeneralResource($visitRequest);
    }

    public function update(VisitRequest $visitRequest, Request $request) : GeneralResource
    {
        $visitRequest -> update($request -> all());

        return new GeneralResource($visitRequest);
    }

    public function destroy(VisitRequest $visitRequest)
    {
        $visitRequest -> delete();

        return response() -> json();
    }
}
