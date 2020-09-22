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
}
