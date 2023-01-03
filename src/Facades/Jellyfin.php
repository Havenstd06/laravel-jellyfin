<?php

namespace Havenstd06\LaravelJellyfin\Facades;

/*
 * Class Facade
 * @package Havenstd06\LaravelJellyfin
 */

use Illuminate\Support\Facades\Facade;

class Jellyfin extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'Havenstd06\LaravelJellyfin\JellyfinFacadeAccessor';
    }
}
