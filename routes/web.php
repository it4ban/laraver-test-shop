<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // $aboutPageUrl = route('about');
    // dd($aboutPageUrl);

    $productUrl = route('product.view', ['lang' => 'en', 'id' => 1]);
    dd($productUrl);

    return view('welcome');
});

Route::get('/user/profile', function () {})->name('profile');

Route::get('/current-user/', function () {
    // return redirect()->route('profile');
    return to_route('profile');
});

Route::view('/about/', 'about')->name('about');

Route::get('/product/{id}', function (string $id) {
    return "Works! $id";
})->whereAlphaNumeric('id');

Route::get('/user/{username}', function (string $username) {
    // ...
})->where('username', '[a-z]+');

Route::get('{lang}/product/{id}', function (string $lang, string $id) {
    // ...
})->where(['lang' => '[a-z]{2}', 'id' => '\d{4,}'])->name('product.view');

Route::get('/search/{search}', function (string $search) {
    return "$search";
})->where('search', '.+');
