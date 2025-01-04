<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/prep', function () {
    return view('prep');
});

Route::get('/recipes', function () {
    return view('recipes');
});

Route::get('/calendar', function () {
    return view('calendar');
});
