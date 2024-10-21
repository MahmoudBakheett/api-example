<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/create-token', function (Request $request) {

    if ($request->email != "mahmoud-bakheet@outlook.com") {
        return ['error' => 'The provided email not match my personal email !.'];
    }

    $user = User::where('email', "mahmoud-bakheet@outlook.com")->first();

    return (!$user) ? "run php artisan migrate and php artisan db:seed" : $user->createToken($request->email)->plainTextToken;
});

Route::get('/get-message', function () {
    return 'I can HEAR you';
})->middleware('auth:sanctum');

Route::get('/login', function () {
    return 'you have to provided this email mahmoud-bakheet@outlook.com  to get your token ';
})->name("login");
