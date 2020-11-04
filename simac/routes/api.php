<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Visitor;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//GET Statements

//Visitor
Route::apiResource('/visitors', 'VisitorController');

//Account
Route::apiResource('/accounts', 'AccountController');

//Building
Route::apiResource('/buildings', 'BuildingController');

//Checkin
Route::apiResource('/checkin', 'CheckinController');

//Checkout
Route::apiResource('/checkout', 'CheckoutController');

//Company
Route::apiResource('/companies', 'CompanyController');

//Employee
Route::apiResource('/employees', 'EmployeeController');

//Host
Route::apiResource('/hosts', 'HostController');

//Office
Route::apiResource('/offices', 'OfficeController');

//QRcode
Route::apiResource('/qrcodes','QrcodeController');

//Schedule
Route::apiResource('/schedules', 'ScheduleController');

Route::apiResource('/departments', 'DepartmentController');

Route::apiResource('/visitrequests', 'VisitRequestController');

Route::apiResource('/pre-register', 'PreRegisterController');

Route::apiResource('/send','MailController');

//meetings + reports

