<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendgridController extends Controller
{
    public function notifications (Request $request)
    {
    	return response()->json($request->all());
    }

    /*private function createEvent ()
    {

    }*/
}
