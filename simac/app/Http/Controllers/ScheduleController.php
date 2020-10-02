<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;
/**
 * @OA\Tag(
 *     name="Schedule",
 *     description="API Endpoints of Schedule Controller"
 * )
 */
class ScheduleController extends Controller
{
    public function show(Schedule $schedule) : GeneralResource
    {
        return new GeneralResource($schedule);
    }

    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(Schedule::paginate());
    }

    public function store(Request $request)
    {
        $request -> validate([
            'host_id'       => 'required',
            'dateTime'         => 'required',
            'office_id'      => 'required',
            'host_message'      => 'required',
            'accepted'      => 'required',
        ]);

        $schedule = Schedule::create($request ->all());

        return new GeneralResource($schedule);
    }

    public function update(Schedule $schedule, Request $request) : GeneralResource
    {
        $schedule -> update($request -> all());

        return new GeneralResource($schedule);
    }

    public function destroy(Schedule $schedule)
    {
        $schedule -> delete();

        return response() -> json();
    }
}
