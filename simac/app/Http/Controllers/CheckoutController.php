<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;
use Illuminate\Support\Facades\DB;
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
    public function index()
    {
        if (isset($_GET['s'])) {
            $sort = $_GET['s'];

            $startDate = new \DateTime();
            $startDate = $startDate->modify("-$sort day")->format("Y-m-d");

            $endDate = new \DateTime();
            $endDate = $endDate->format("Y-m-d");

            $checkouts = DB::table('checkouts')
                ->whereBetween('dateTime', [$startDate, $endDate])
                ->join('visitors', 'checkouts.visitor_id', '=', 'visitors.id')
                ->join('buildings', 'checkouts.building_id', '=', 'buildings.id')
                ->select('checkouts.dateTime', 'visitors.first_name', 'visitors.last_name', 'buildings.name')
                ->oldest('dateTime')
                ->paginate(15);

            return $checkouts;
        } else if (isset($_GET['sd']) && isset($_GET['ed'])) {
            $startDate = new \DateTime($_GET['sd']);
            $startDate = $startDate->format("Y-m-d");

            $endDate = new \DateTime($_GET['ed']);
            $endDate = $endDate->format("Y-m-d");

            $checkouts = DB::table('checkouts')
                ->whereBetween('dateTime', [$startDate, $endDate])
                ->join('visitors', 'checkouts.visitor_id', '=', 'visitors.id')
                ->join('buildings', 'checkouts.building_id', '=', 'buildings.id')
                ->select('checkouts.dateTime', 'visitors.first_name', 'visitors.last_name', 'buildings.name')
                ->oldest('dateTime')
                ->paginate(15);

            return $checkouts;
        } else {
            return new GeneralResourceCollection(Checkin::paginate());
        }
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