<?php

namespace App\Http\ApiApp;

use Illuminate\Http\Request;

class ApiHendlar 
{
    public function processApi(Request $request, $slug) 
    {
        return response()->json(['status' => 'Success']);
    }
}