<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SendEmail extends Controller
{
    public function index()
    {
        return view('formSendEmail');
    }

    public function send(Request $req){
        \App\Models\SendEmail::Send($req->email,$req->name,$req->subject,$req->content);
        return redirect('sendEmail');
    }
}
