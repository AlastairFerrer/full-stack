<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/sample_bossing', [Controller::class, 'sample_bossing']);

Route::post('/insert_bossing', [Controller::class , 'insert_bossing']);
