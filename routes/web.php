<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('listings', [
        'heading' => 'latest listings',
        'listings' =>
        [
            'id' => 1,
            'title' => 'Listing One',
            'description' => 'Here paste or grab some dummy text',
        ],
        [
            'id' => 1,
            'title' => 'Listing One',
            'description' => 'Here paste or grab some dummy text',
        ],
    ]);
});
