<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
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
    /**
     * @OA\Get(
     *     path="/api/schedules/{scheduleId}",
     *     @OA\Response(response="default", description="information about the schedule (host id, date and time, office id, host message, accepted)")
     * )
     */
    public function show(Schedule $schedule) : GeneralResource
    {
        return new GeneralResource($schedule);
    }
    /**
     * @OA\Get(
     *     path="/api/schedules",
     *     @OA\Response(response="default", description="information about all the schedule (host id, date and time, office id, host message, accepted)")
     * )
     */
    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(Schedule::paginate());
    }
    /**
     * @OA\Post(
     *     path="/api/schedules",
     *     @OA\Response(response="default", description="information about the created schedule (host id, date and time, office id, host message, accepted)")
     * )
     */
    public function store(Request $request)
    {
        $request -> validate([
            'host_id'       => 'required',
            'dateTime'      => 'required',
            'office_id'     => 'required',
            'host_message'  => 'required',
            'department_id' => 'required',
            'company_id'    => 'required',
            'floor'         => 'required',
            'phone_number'  => 'required',
            'visitor_id'  => 'required'
        ]);

        $schedule = Schedule::create($request ->all());

        return new GeneralResource($schedule);
    }
    /**
     * @OA\Put(
     *     path="/api/schedules/{scheduleId}",
     *     @OA\Response(response="default", description="updated information about the schedule (host id, date and time, office id, host message, accepted)")
     * )
     */
    public function update(Schedule $schedule, Request $request) : GeneralResource
    {
        $schedule -> update($request -> all());

        return new GeneralResource($schedule);
    }
    /**
     * @OA\Delete(
     *     path="/api/schedules/{scheduleId}",
     *     @OA\Response(response="default", description="empty array")
     * )
     */
    public function destroy(Schedule $schedule)
    {
        $schedule -> delete();

        return response() -> json();
    }
}
