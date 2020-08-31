<?php

return [

	/*
     * Determine if remote logging should be enabled.
     */
    'enabled' => env('REMOTELOGGING_ENABLED', false),

    /*
     * Specify the Autorization Bearer token that will be used for remote logging.
     */
    'token' => env('LAB_TOKEN'),

    /*
     * Specify the base url that will be used.
     */
    'url' => env('LAB_BASE_URL'),

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
