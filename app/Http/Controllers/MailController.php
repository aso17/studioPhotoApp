<?php

namespace App\Http\Controllers;

use App\Mail\SingupEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function sendSignupEmail($name, $email, $verifikasi)
    {

        $data = [
            'name' => $name,
            'verify' => $verifikasi,
        ];

        Mail::to($email)->send(new SingupEmail($data));
    }
}