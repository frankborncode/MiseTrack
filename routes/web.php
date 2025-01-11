<?php

use App\Models\Recipe;
use Illuminate\Support\Facades\Route;
use Termwind\Components\Dd;

// Home page
Route::get('/', function () {
    return view('dashboard');
});

// Index
Route::get('/recipe', function () {

    $recipe = Recipe::paginate(10);

    return view('recipe.index', ['recipe' => $recipe]);
});


// recipe form
Route::get('recipe/create', function () {
    return view('recipe.create');
});


// create recipe POST
Route::post('/recipe', function () {
    // Validation
    request()->validate([
        'title' => ['required', 'min:3'],
        'ingredients' => ['required'],
        'preparation' => ['required'],
    ]);

    // Create a recipe in the database
    Recipe::create([
        'title' => request('title'),
        'ingredients' => request('ingredients'),
        'preparation' => request('preparation'),
    ]);

    // Redirect back to the index page

    return redirect('/');
});
