<?php

use App\Http\Controllers\InstitutionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/test', function () {
    $institution = InstitutionController::getInstitutions();
    //dd($institution);
    return view('test')->with('institution', $institution);
});

Route::get('/home', function () {
    return view('dashboard');
});

Route::get('/upload', function () {
    return view('upload');
});



