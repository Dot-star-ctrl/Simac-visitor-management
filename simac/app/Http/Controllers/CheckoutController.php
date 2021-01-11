<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;
/**
 * @OA\Tag(
 *     name="Checkout",
 *     description="API Endpoints of Checkout Controller"
 * )
 */
class CheckoutController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/checkout/{checkoutId}",
     *     @OA\Response(response="default", description="information about the checkout (visitor id, date and time, building id)")
     * )
     */
    public function show(Checkout $checkout) : GeneralResource
    {
        return new GeneralResource($checkout);
    }
    /**
     * @OA\Get(
     *     path="/api/checkout",
     *     @OA\Response(response="default", description="information about all the checkouts (visitor id, date and time, building id)")
     * )
     */
    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(Checkout::paginate());
    }
    /**
     * @OA\Post(
     *     path="/api/checkout",
     *     @OA\Response(response="default", description="information about the created checkout (visitor id, date and time, building id)")
     * )
     */
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
    /**
     * @OA\Put(
     *     path="/api/checkout/{checkoutId}",
     *     @OA\Response(response="default", description="updated information about the checkout (visitor id, date and time, building id)")
     * )
     */
    public function update(Checkout $checkout, Request $request) : GeneralResource
    {
        $checkout -> update($request -> all());

        return new GeneralResource($checkout);
    }
    /**
     * @OA\Delete(
     *     path="/api/checkout/{checkoutId}",
     *     @OA\Response(response="default", description="empty array")
     * )
     */
    public function destroy(Checkout $checkout)
    {
        $checkout -> delete();

        return response() -> json();
    }
}
