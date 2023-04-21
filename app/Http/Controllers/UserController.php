<?php

namespace App\Http\Controllers;

use App\Helpers\StringHelper;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Prologue\Alerts\Facades\Alert;

class UserController extends Controller
{
    public static function loginRequest()
    {
        $username = StringHelper::removeAccents(request()->username);
        $password = request()->password;
        $institution = request()->institution;
        return self::getUser($username, $password, $institution);
    }

    public static function getUser($username, $password, $institution)
    {
        $bearer = AuthController::getToken($username, $password, $institution);
        $url = 'https://' . $institution . '.e-kreta.hu/dktapi/felhasznalo?szerepkorok=true';
        $headers = [
            'Authorization' => 'Bearer ' . $bearer,
        ];

        $response = Http::withHeaders($headers)->get($url);
        $response = json_decode($response, true);

        $roles = $response['szerepkorok'];

        if (in_array('Tanar', $roles)) {

            $user = User::firstOrNew([
                'edu_id' => $response['oktatasiAzonosito'],
            ]);

            $user->email = $response['emailCim'];
            $user->full_name = $response['nev'];
            $user->last_login = now();

            if ($user->point === null) {
                $user->point = 10;
            }
            $user->save();
            Session::put('active_user', $user);

            return redirect()->route('home')->with('success', 'Sikeres bejelentkezés!');
        }

        return redirect()->route('login')->with('error', 'Sikertelen bejelentkezés!');
    }
}
