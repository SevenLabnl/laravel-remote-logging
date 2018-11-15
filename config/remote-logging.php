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

];
