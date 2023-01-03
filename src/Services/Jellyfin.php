<?php

namespace Havenstd06\LaravelJellyfin\Services;

use Havenstd06\LaravelJellyfin\Traits\JellyfinRequest;
use Exception;

class Jellyfin
{
    use JellyfinRequest;

    /**
     * Jellyfin constructor.
     *
     * @param array $config
     *
     * @throws Exception
     */
    public function __construct(array $config = [])
    {
        // Setting Jellyfin API Credentials
        $this->setConfig($config);

        $this->httpBodyParam = 'form_params';

        $this->setRequestHeader('Accept', 'application/json');
        $this->setRequestHeader('Content-Type', 'application/json');
    }

    /**
     * Set API options.
     *
     * @param array $credentials
     */
    protected function setOptions(array $credentials): void
    {
        // Setting API Endpoint
        $this->config['server_api_url'] = $credentials['server_url'];
    }
}
