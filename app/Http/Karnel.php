<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * Daftar middleware global aplikasi.
     *
     * @var array
     */
    protected $middleware = [
        // Middleware global lainnya...
    ];

    /**
     * Daftar middleware untuk grup HTTP aplikasi.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            // Middleware untuk grup web
        ],

        'api' => [
            // Middleware untuk grup API
        ],
    ];

    /**
     * Daftar middleware untuk rute aplikasi.
     *
     * @var array
     */
    protected $routeMiddleware = [
        // Middleware lainnya
        'admin' => \App\Http\Middleware\IsAdmin::class, // Mendaftarkan middleware 'admin'
    ];
}
