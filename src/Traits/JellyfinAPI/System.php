<?php

namespace Havenstd06\LaravelJellyfin\Traits\JellyfinAPI;

use Psr\Http\Message\StreamInterface;

trait System
{
    /**
     * Gets information about the request endpoint.
     *
     * @return array|StreamInterface|string
     * @throws \Throwable
     *
     */
    public function getSystemServerInformations(): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "System/Info";

        $this->verb = 'get';

        return $this->doJellyfinRequest();
    }

    /**
     * Gets information about the server.
     *
     * @return array|StreamInterface|string
     * @throws \Throwable
     *
     */
    public function getSystemRequestEndpointInformations(): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "System/Endpoint";

        $this->verb = 'get';

        return $this->doJellyfinRequest();
    }

    /**
     * Gets public information about the server.
     *
     * @return array|StreamInterface|string
     * @throws \Throwable
     *
     */
    public function getSystemPublicInformations(): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "System/Info/Public";

        $this->verb = 'get';

        return $this->doJellyfinRequest();
    }

    /**
     * Gets a list of available server log files.
     *
     * @return array|StreamInterface|string
     * @throws \Throwable
     *
     */
    public function getSystemLogFiles(): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "System/Logs";

        $this->verb = 'get';

        return $this->doJellyfinRequest();
    }

    /**
     * Gets a log file.
     *
     * @param string $logName
     * @return array|StreamInterface|string
     * @throws \Throwable
     */
    public function getSystemLogFile(string $logName): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "System/Logs/Log";

        $this->setRequestQuery('name', $logName);

        $this->verb = 'get';

        return $this->doJellyfinRequest(false);
    }

    /**
     * Pings the system with get.
     *
     * @return array|StreamInterface|string
     * @throws \Throwable
     *
     */
    public function pingSystem(): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "System/Ping";

        $this->verb = 'get';

        return $this->doJellyfinRequest();
    }

    /**
     * Pings the system with post.
     *
     * @return array|StreamInterface|string
     * @throws \Throwable
     *
     */
    public function postPingSystem(): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "System/Ping";

        $this->verb = 'post';

        return $this->doJellyfinRequest();
    }

    /**
     * Restarts the application.
     *
     * @return array|StreamInterface|string
     * @throws \Throwable
     *
     */
    public function restartApplication(): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "System/Restart";

        $this->verb = 'post';

        return $this->doJellyfinRequest(false);
    }

    /**
     * Shuts down the application.
     *
     * @return array|StreamInterface|string
     * @throws \Throwable
     *
     */
    public function shutdownApplication(): StreamInterface|array|string
    {
        $this->apiBaseUrl = $this->config['server_api_url'];

        $this->apiEndPoint = "System/Shutdown";

        $this->verb = 'post';

        return $this->doJellyfinRequest(false);
    }
}