<?php

namespace Havenstd06\LaravelJellyfin;

use Havenstd06\LaravelJellyfin\Services\Jellyfin as JellyfinClient;
use Exception;

class JellyfinFacadeAccessor
{
    /**
     * Jellyfin API provider object.
     */
    public static JellyfinClient $provider;

    /**
     * Get specific Jellyfin API provider object to use.
     *
     * @throws Exception
     *
     * @return JellyfinClient
     */
    public static function getProvider(): JellyfinClient
    {
        return self::$provider;
    }

    /**
     * Set Jellyfin API Client to use.
     *
     * @return JellyfinClient
     * @throws Exception
     *
     */
    public static function setProvider(): JellyfinClient
    {
        // Set default provider.
        self::$provider = new JellyfinClient();

        return self::getProvider();
    }
}
