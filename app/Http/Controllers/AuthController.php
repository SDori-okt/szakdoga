<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public static function getNonce(): bool|string
    {
        $apiURL = 'https://idp.e-kreta.hu/nonce';

        return file_get_contents($apiURL);
    }

    public static function getToken($username, $password, $institution)
    {
        $key = pack('c*', 98, 97, 83, 115, 120, 79, 119, 108, 85, 49, 106, 77);
        $nonce = self::getNonce();
        $message = strtoupper($institution) . $nonce . strtoupper($username);
        $dig = hash_hmac('sha512', $message, $key, true);
        $generated = base64_encode($dig);
        $headers = [
            'Content-Type: application/x-www-form-urlencoded; charset=utf-8',
            'User-Agent: hu.ekreta.student/1.0.5/Android/0/0',
            'X-AuthorizationPolicy-Key: ' . $generated,
            'X-AuthorizationPolicy-Version: v2',
            'X-AuthorizationPolicy-Nonce: ' . $nonce
        ];

        $data = http_build_query(array(
            'userName' => $username,
            'password' => $password,
            'institute_code' => $institution,
            'grant_type' => 'password',
            'client_id' => 'kreta-ellenorzo-mobile-android'
        ));

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://idp.e-kreta.hu/connect/token");
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);

        try {
            return json_decode($response, true)['access_token'];
        } catch (Exception) {
            return $response;
        }
    }

    public static function isTeacher($username, $password, $institution)
    {
        $bearer = self::getToken($username, $password, $institution);
        $url = 'https://' . $institution . '.e-kreta.hu/dktapi/felhasznalo?szerepkorok=true';
        $headers = [
            'Authorization' => 'Bearer ' . $bearer,
        ];

        $response = Http::withHeaders($headers)->get($url);
        $response = json_decode($response, true);

        $roles = $response['szerepkorok'];

        if (in_array('Tanar', $roles)) {
            return true;
        } else {
            return false;
        }
    }
}
