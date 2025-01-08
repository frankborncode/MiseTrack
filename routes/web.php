<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


Route::get('/recipe', function () {
    return view('create-recipe');
});
