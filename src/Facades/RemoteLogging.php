<?php

namespace SevenLab\RemoteLogging\Facades;

use Illuminate\Support\Facades\Facade;

class RemoteLogging extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @see \SevenLab\ResponseCache\ResponseCache
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'remote-logging';
    }
}
