<?php

use App\Http\Controllers\InstitutionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/test', function () {
    return view('test');
});

Route::get("institution", [InstitutionController::class, "getInstitutions"]);
