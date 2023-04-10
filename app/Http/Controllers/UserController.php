<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public static function getUser($username, $password, $institution): User
    {
        $bearer = AuthController::getToken($username, $password, $institution);
        $url = 'https://' . $institution . '.e-kreta.hu/dktapi/felhasznalo?szerepkorok=true';
        $headers = [
            'Authorization' => 'Bearer ' . $bearer,
        ];

        $response = Http::withHeaders($headers)->get($url);
        $response = json_decode($response, true);

        $user = User::firstOrNew([
            'edu_id' => $response['oktatasiAzonosito'],
            'email' => $response['emailCim'],
            'full_name' => $response['nev'],
        ]);

        $user->last_login = now();

        if ($user->point === null) {
            $user->point = 10;
        }
        $user->save();

        return $user;
    }
}
