<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkout;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;

class CheckoutController extends Controller
{
    public function show(Checkout $checkout) : GeneralResource
    {
        return new GeneralResource($checkout);
    }

    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(Checkout::paginate());
    }

    public function store(Request $request)
    {
        $request -> validate([
            'visitor_id'       => 'required',
            'dateTime'         => 'required',
            'building_id'      => 'required',
        ]);

        $checkout = Checkout::create($request ->all());

        return new GeneralResource($checkout);
    }

    public function update(Checkout $checkout, Request $request) : GeneralResource
    {
        $checkout -> update($request -> all());

        return new GeneralResource($checkout);
    }

    public function destroy(Checkout $checkout)
    {
        $checkout -> delete();

        return response() -> json();
    }
}
