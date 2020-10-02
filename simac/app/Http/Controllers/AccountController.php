<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;
/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Laravel OpenApi Demo Documentation",
 *      description="The API for the Simac System description",
 *      @OA\Contact(
 *          email="developers@simac.com"
 *      ),
 * )
 *
 * @OA\Tag(
 *     name="Account",
 *     description="API Endpoints of Account Controller"
 * )
 */
class AccountController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/accounts",
     *     @OA\Response(response="default", description="information about the visitor (id and password)")
     * )
     */
    public function show(Account $account) : GeneralResource
    {
        return new GeneralResource($account);
    }

    public function index() : GeneralResourceCollection
    {
        return new GeneralResourceCollection(Account::paginate());
    }

    public function store(Request $request)
    {
        $request -> validate([
            'visitor_id'       => 'required',
            'password'         => 'required',
        ]);

        $account = Account::create($request ->all());

        return new GeneralResource($account);
    }

    public function update(Account $account, Request $request) : GeneralResource
    {
        $account -> update($request -> all());

        return new GeneralResource($account);
    }

    public function destroy(Account $account)
    {
        $account -> delete();

        return response() -> json();
    }
}
