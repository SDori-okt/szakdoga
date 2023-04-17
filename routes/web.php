<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $institution = InstitutionController::getInstitutions();
    return view('login')->with('institution', $institution);
});

Route::get('/home', function () {
    return view('dashboard');
})->name('home');

Route::get('/upload', function () {
    $types = TypeController::getAllTypes();
    return view('upload')->with('types', $types);
});

Route::get('/authTest', function(){
    return AuthController::isTeacher('Stencinger Dora', '', 'gyszc-bolyai');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/userTest', function(){
    return UserController::getUser('Stencinger Dora', '', 'gyszc-bolyai');
});

Route::post('/upload', 'App\Http\Controllers\FileController@store')->name('files.store');

