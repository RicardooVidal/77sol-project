<?php

use App\Exceptions\EquipmentOnProjectException;
use App\Exceptions\InvalidDocumentException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        api: __DIR__.'/../routes/api.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (EquipmentOnProjectException $e, Request $request) {
            return response()->json(['error' => 'Equipment already on project'], status: 400);
        });

        $exceptions->render(function (InvalidDocumentException $e, Request $request) {
            return response()->json(['error' => 'Invalid Document'], status: 400);
        });
    })->create();
