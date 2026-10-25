<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->validateCsrfTokens(except: [
            'bale',
            'bale/*',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->report(function (Throwable $e) {

            $trace = collect($e->getTrace())
                ->first(fn ($frame) =>
                    isset($frame['file']) &&
                    str_starts_with(
                        $frame['file'],
                        app_path() . DIRECTORY_SEPARATOR
                    )
                );

            $file = $trace['file'] ?? $e->getFile();
            $line = $trace['line'] ?? $e->getLine();

            Log::error($e->getMessage(), [
                'file' => str_replace(base_path() . DIRECTORY_SEPARATOR, '', $file),
                'line' => $line,
            ]);

            return false;
        });
    })->create();
