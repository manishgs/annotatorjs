<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController {

    public function index(Request $request)
    {
        $page = $request->get('page', 1);

        return view('index', compact('page'));
    }
}
