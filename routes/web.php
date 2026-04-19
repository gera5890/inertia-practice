<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Index',[
        'name' => 'Gerardo Vera Velasco',
        'frameworks' => [
            'inertia',
            'laravel',
            'vue'
        ],
        'time' => now()->toTimeString()
    ]);
});

Route::get('/posts', function(){
    return Inertia::render('Posts');
});

Route::resource('/users', UserController::class);

Route::get('/roles', function(){
    return Inertia::render('Roles');
});

Route::get('/Home', function(){
    return Inertia::render('Home');
});

Route::post('/logout', function(){
    
dd(Inertia::flash('message', 'User created successfully!'));

    return back();
});