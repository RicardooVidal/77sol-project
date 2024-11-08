<?php

use App\Http\Controllers\SwaggerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/api-doc');
});

Route::get('/status', function () {
    return 'OK';
});

Route::get('/api-doc', [SwaggerController::class, 'serveSwagger']);