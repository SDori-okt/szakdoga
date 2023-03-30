<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InstitutionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $institution = InstitutionController::getInstitutions();
    return view('login')->with('institution', $institution);
});

Route::get('/home', function () {
    return view('dashboard');
});

Route::get('/upload', function () {
    return view('upload');
});

Route::get('/authTest', function(){
    return AuthController::isTeacher('Vinnai Zsolt', '012345678', 'gyszc-bolyai');
});
