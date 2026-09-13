<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin-test', function () {
    return 'Welcome Admin';
})->middleware(['auth', 'role:admin']);
