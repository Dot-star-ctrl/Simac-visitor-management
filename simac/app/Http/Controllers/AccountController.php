<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Http\Resources\GeneralResource;
use App\Http\Resources\GeneralResourceCollection;

class AccountController extends Controller
{
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
