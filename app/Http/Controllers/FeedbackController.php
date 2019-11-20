<?php

namespace App\Http\Controllers;

use App\Models\Preferences;
use App\Models\Customers;
use App\Models\Menus;
use Illuminate\Http\Request;

class PreferencesController extends Controller
{
    public function store(Request $request)
    {
        // die('aku cinta kamu');
        $this->validate($request, [
            'skorPagi'    => 'required',
            'skorSiang'   => 'required',
            'skorMalam'   => 'required'
        ]);

        $preferences = $request->customers()->preferences()->create([
            ['userID'    => customers()->customerID->json('userID'),
            'menuID'    => menus()->menuID->json('menuID'),
            'skorPagi'  => $request->json('score')],
			['userID'    => user()->userID->json('userID'),
            'menuID'    => menu()->menuID->json('menuID'),
            'skorSiang'  => $request->json('score')],
			['userID'    => user()->userID->json('userID'),
            'menuID'    => menu()->menuID->json('menuID'),
            'skorSore'  => $request->json('score')]
        ]);

        return $preferences;

    }
}
