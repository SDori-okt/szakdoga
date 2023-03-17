<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class InstitutionController extends Controller
{
    public static function getInstitutions()
    {
        $apiURL = 'https://kretaglobalmobileapi2.ekreta.hu/api/v3/Institute';
        $headers = [
            'apiKey' => '7856d350-1fda-45f5-822d-e1a2f3f1acf0'
        ];

        $response = Http::withHeaders($headers)->get($apiURL);
        $response = json_decode($response, true);

        usort($response, function ($a, $b) {
            return strcmp(trim($a['name']), trim($b['name']));
        });

        return $response;
    }
}
