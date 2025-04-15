<?php

use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        using: function () {

        

            $clientRoutes = [
                'home.php',
                'about.php',
                'contact.php',
                'blog.php',
                'cart.php',
                'product.php',
                'productdetail.php'
            ];

            foreach ($clientRoutes as $route) {
                Route::middleware('web')
                    ->prefix('')
                    ->name('client.')
                    ->group(base_path("routes/client/{$route}"));
            }

            Route::fallback(function () {
                return response()->view('error.404', [], 404);
            });
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
