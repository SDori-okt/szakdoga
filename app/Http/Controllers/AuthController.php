<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public static function getNonce(): bool|string
    {
        $apiURL = 'https://idp.e-kreta.hu/nonce';

        return file_get_contents($apiURL);
    }
}
