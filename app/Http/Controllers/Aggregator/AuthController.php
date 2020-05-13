<?php

namespace App\Http\Controllers\Aggregator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getIndex() {
        return view('aggregator.auth');
    }

    public function checkAuth(Request $request)
    {
        $all = $request->all();
        $loginAuth = $all['login'];
        $pass = $all['password'];
        $save = $all['password'];
        $submitOn = $all['submin_on'];


        return redirect()->route('auth');

    }
}
