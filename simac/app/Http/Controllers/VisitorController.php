<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visitor;
use App\Http\Resources\VisitorResource;
use App\Http\Resources\VisitorResourceCollection;

class VisitorController extends Controller
{
    public function show(Visitor $visitor) : VisitorResource
    {
        return new VisitorResource($visitor);
    }

    public function index() : VisitorResourceCollection
    {
        return new VisitorResourceCollection(Visitor::paginate());
    }

    public function store(Request $request)
    {
        $request -> validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required',
        ]);

        $visitor = Visitor::create($request ->all());

        return new VisitorResource($visitor);
    }

    public function update(Visitor $visitor, Request $request) : VisitorResource
    {
        $visitor -> update($request -> all());

        return new VisitorResource($visitor);
    }

    public function destroy(Visitor $visitor)
    {
        $visitor -> delete();

        return response() -> json();
    }
}
