<?php

return [

	/*
     * Determine if remote logging should be enabled.
     */
    'enabled' => env('REMOTELOGGING_ENABLED', true),

    /*
     * Specify the Autorization Bearer token that will be used for remote logging.
     */
    'token' => env('REMOTELOGGING_TOKEN'),

    /*
     * Specify the url that will be used for remote logging.
     */
    'url' => env('REMOTELOGGING_URL'),

    /*
     * The exceptions that should be excluded from remote logging.
     */
    'dontReport' => [
        Illuminate\Auth\Access\AuthorizationException::class,
        Illuminate\Auth\AuthenticationException::class,
        Illuminate\Foundation\Http\Exceptions\MaintenanceModeException::class,
        Illuminate\Session\TokenMismatchException::class,
        Illuminate\Validation\ValidationException::class,
        Symfony\Component\HttpKernel\Exception\NotFoundHttpException::class,
        Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException::class,
    ],

];
