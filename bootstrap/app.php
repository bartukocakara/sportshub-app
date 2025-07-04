<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\ApiLocale;
use App\Http\Middleware\HandleNotFound;
use App\Http\Middleware\SetDefaultPerPage;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            __DIR__.'/../routes/web.php',
            __DIR__.'/../routes/court-business.php',
            __DIR__.'/../routes/admin.php',
            __DIR__.'/../routes/api.php',
        ],
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web( // Add HandleNotFound middleware to web routes
            append: [
                HandleNotFound::class,
                SetDefaultPerPage::class
            ]
        );
        $middleware->api(
            append:[
                ApiLocale::class,
            ]
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $e, $request) {
            if ($e instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
                return redirect()->route('home');
            }
            return null;
        });
    })->create();
