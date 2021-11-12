<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public const LOGIN = 'expologin';
    public const PASSW = 'expopassw';

    public function login(Request $request)
    {
        if (
            $request->input('login') === self::LOGIN &&
            $request->input('password') === self::PASSW
        ) {
            Session::put('login', $request->input('login'));
            Session::put('password', $request->input('password'));

            return redirect()->route('property.index');
        }

        return redirect()->back();
    }

    public function index(Request $request)
    {
        return view('admin.index');
    }
}
