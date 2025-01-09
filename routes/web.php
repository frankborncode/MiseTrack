<?php

use App\Models\recipes;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


Route::get('/recipe', function () {
    return view('create-recipe');
});

Route::get('/recipes', function () {

    $recipes = recipes::paginate(5);

    return view('recipes', ['recipes' => $recipes]);
});
