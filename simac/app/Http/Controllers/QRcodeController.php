<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qrcode;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;

class QrcodeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/qrcodes/{qrcodeId}",
     *     @OA\Response(response="default", description="information about the qrCode (code, visitor id, and schedule)")
     * )
     */
    public function show(Qrcode $Qrcode){

        $firstName = $Qrcode -> first_name;
        $lastName = $Qrcode -> last_name;
        $title = 'Mr.';
        $email = $Qrcode -> email;

        // Addresses
        $workAddress = [
        'type' => 'work',
        'pref' => false,
        'floor' => $Qrcode -> floor,
        'number' => $Qrcode -> office,
        ];

        $addresses = [$workAddress];

        // Phones
        $workPhone = [
            'type' => 'work',
            'number' => $Qrcode -> phone,
            'cellPhone' => false
        ];

        $phones = [$workPhone];

        return \QRCode::vCard($firstName, $lastName, $title, $email, $addresses, $phones)
                    ->setErrorCorrectionLevel('H')
                    ->setSize(4)
                    ->setMargin(2)
//                    ->setOutfile(public_path('/QRcodes/'. $Qrcode -> id .'.png'))
//                    ->png();
        ->svg();

    }

    /**
     * @OA\Get(
     *     path="/api/qrcodes",
     *     @OA\Response(response="default", description="information about all the qrCode (code, visitor id, and schedule)")
     * )
     */
    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(Qrcode::paginate());
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'floor'         => 'required',
            'office' => 'required',
            'phone'  => 'required',
            'visitor_id'    => 'required',
            'schedule_id'   => 'required',
        ]);

        $qrCode = Qrcode::create($request ->all());

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

    // public function make(){
    //     $file = public_path('qr.png');
    //     return \QRCode::text('QR Code Generator for Laravel!')->setOutfile($file)->png();
    // }

    public function vcard(){
        // Personal Information
    $firstName = 'John';
    $lastName = 'Doe';
    $title = 'Mr.';
    $email = 'john.doe@example.com';

    // Addresses
    $workAddress = [
       'type' => 'work',
       'pref' => false,
       'floor' => '1',
       'number' => '1.132B',
    ];

    $addresses = [$workAddress];

    // Phones
    $workPhone = [
        'type' => 'work',
        'number' => '001 555-1234',
        'cellPhone' => false
    ];

    $phones = [$workPhone];

    return \QRCode::vCard($firstName, $lastName, $title, $email, $addresses, $phones)
                ->setErrorCorrectionLevel('H')
                ->setSize(4)
                ->setMargin(2)
                ->svg();
    }
}
