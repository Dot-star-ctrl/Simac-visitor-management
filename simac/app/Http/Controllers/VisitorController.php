<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitor;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;

class VisitorController extends Controller
{
    public function show(Visitor $visitor) : GeneralResource
    {
        return new GeneralResource($visitor);
    }

    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(Visitor::paginate());
    }

    public function store(Request $request)
    {
        $request -> validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required',
        ]);

        $visitor = Visitor::create($request ->all());

        return new GeneralResource($visitor);
    }

    public function update(Visitor $visitor, Request $request) : GeneralResource
    {
        $visitor -> update($request -> all());

        return new GeneralResource($visitor);
    }

    public function destroy(Visitor $visitor)
    {
        $visitor -> delete();

        return response() -> json();
    }
}
