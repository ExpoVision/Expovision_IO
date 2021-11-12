<?php

namespace App\Http\Controllers;

use App\Mail\ContactRequest;
use App\Mail\ShareRequestMail;
use App\Models\ShareRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ShareRequestController extends Controller
{
    public function newRequest(Request $request)
    {
        Mail::to(env('EXPO_EMAIL'))->send(new ShareRequestMail(
            $request->input('name'),
            $request->input('email'),
            $request->input('have_currency'),
            $request->input('can_buy'),
        ));

        ShareRequest::create($request->except('_method', '_token'));

        return redirect()->back();
    }

    public function newContactRequest(Request $request)
    {
        Mail::to(env('EXPO_EMAIL'))->send(new ContactRequest(
            $request->input('name'),
            $request->input('email'),
            $request->input('message'),
        ));

        ShareRequest::create($request->except('_method', '_token'));

        return redirect()->back();
    }
}
