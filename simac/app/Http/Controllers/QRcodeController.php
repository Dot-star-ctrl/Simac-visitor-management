<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QRcode;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;
/**
 * @OA\Tag(
 *     name="QRcode",
 *     description="API Endpoints of QRcode Controller"
 * )
 */
class QRcodeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/qrcodes/{qrcodeId}",
     *     @OA\Response(response="default", description="information about the qrCode (code, visitor id, and schedule)")
     * )
     */
    public function show(QRcode $qrCode) : GeneralResource
    {
        return new GeneralResource($qrCode);
    }
    /**
     * @OA\Get(
     *     path="/api/qrcodes",
     *     @OA\Response(response="default", description="information about all the qrCode (code, visitor id, and schedule)")
     * )
     */
    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(QRcode::paginate());
    }
    /**
     * @OA\Post(
     *     path="/api/qrcodes",
     *     @OA\Response(response="default", description="information about the created qrCode (code, visitor id, and schedule)")
     * )
     */
    public function store(Request $request)
    {
        $request -> validate([
            'code'          => 'required',
            'visitor_id'    => 'required',
            'schedule'      => 'required',
        ]);

        $qrCode = QRcode::create($request ->all());

        return new GeneralResource($qrCode);
    }
    /**
     * @OA\Put(
     *     path="/api/qrcodes/{qrcodeId}",
     *     @OA\Response(response="default", description="updated information about the qrCode (code, visitor id, and schedule)")
     * )
     */
    public function update(QRcode $qrCode, Request $request) : GeneralResource
    {
        $qrCode -> update($request -> all());

        return new GeneralResource($qrCode);
    }
    /**
     * @OA\Delete(
     *     path="/api/qrcodes/{qrcodeId}",
     *     @OA\Response(response="default", description="empty array")
     * )
     */
    public function destroy(QRcode $qrCode)
    {
        $qrCode -> delete();

        return response() -> json();
    }


}
