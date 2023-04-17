<?php

use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/test', function () {
    $institution = InstitutionController::getInstitutions();
    return view('test')->with('institution', $institution);
});

Route::get('/home', function () {
    return view('dashboard');
})->name('home');

Route::get('/upload', function () {
    $types = TypeController::getAllTypes();
    return view('upload')->with('types', $types);
});

Route::get('/search', function () {
    return view('search');
});

Route::post('/upload', 'App\Http\Controllers\FileController@store')->name('files.store');

