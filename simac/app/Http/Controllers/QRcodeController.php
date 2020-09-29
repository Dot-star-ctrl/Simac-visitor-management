<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QRcode;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;

class QRcodeController extends Controller
{
    public function show(QRcode $qrCode) : GeneralResource
    {
        return new GeneralResource($qrCode);
    }

    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(QRcode::paginate());
    }

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

    public function update(QRcode $qrCode, Request $request) : GeneralResource
    {
        $qrCode -> update($request -> all());

        return new GeneralResource($qrCode);
    }

    public function destroy(QRcode $qrCode)
    {
        $qrCode -> delete();

        return response() -> json();
    }
}
