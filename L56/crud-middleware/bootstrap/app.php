<?php

use App\Http\Middleware\CheckUnavailablePizza;
use App\Http\Middleware\MaintenanceMode;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->append(MaintenanceMode::class);
        // $middleware->append(CheckUnavailablePizza::class);

        //Se vuoi puoi creare degli alias in questo modo
        $middleware->alias([
            'check.unavailable' => CheckUnavailablePizza::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
