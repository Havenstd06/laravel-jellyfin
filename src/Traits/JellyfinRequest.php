<?php

namespace Havenstd06\LaravelJellyfin\Traits;

use Havenstd06\LaravelJellyfin\Services\Jellyfin;
use RuntimeException;

trait JellyfinRequest
{
    use JellyfinHttpClient;
    use JellyfinAPI;

    /**
     * Jellyfin API Token.
     *
     * @var string
     */
    public string $token;

    /**
     * Jellyfin API configuration.
     *
     * @var array
     */
    private array $config;

    /**
     * Additional options for Jellyfin API request.
     *
     * @var array
     */
    protected array $options = [];

    /**
     * Set Jellyfin API Credentials.
     *
     * @param array $credentials
     * @throws \Exception
     */
    public function setApiCredentials(array $credentials): void
    {
        if (empty($credentials)) {
            $this->throwConfigurationException();
        }

        // Set API configuration for the Jellyfin provider
        $this->setApiProviderConfiguration($credentials);

        // Set Http Client configuration.
        $this->setHttpClientConfiguration();
    }

    /**
     * Set configuration details for the provider.
     *
     * @param array $credentials
     *
     * @throws \Exception
     */
    private function setApiProviderConfiguration(array $credentials): void
    {
        // Setting Jellyfin API Credentials
        collect($credentials)->map(function ($value, $key) {
            $this->config[$key] = $value;
        });

        $this->validateSSL = $this->config['validate_ssl'];

        $this->setRequestHeader('X-Emby-Token', $this->config['token']);
        $this->setRequestHeader('X-Application', $this->config['application'] ?: 'Laravel Jellyfin / v1.0');
        $this->setRequestHeader('X-Emby-Authorization', 'MediaBrowser Client="' . $this->config['application'] . ' CLI", Device="'. $this->config['application'] .'-CLI", DeviceId="None", Version="' . $this->config['version'] . '"');

        $this->setOptions($this->config);
    }

    /**
     * Function to add request header.
     *
     * @param string $key
     * @param string $value
     *
     * @return Jellyfin
     */
    public function setRequestHeader(string $key, string $value): Jellyfin
    {
        $this->options['headers'][$key] = $value;

        return $this;
    }

    /**
     * Function to add request header.
     *
     * @param array $value
     * @return Jellyfin
     */
    public function setArrayRequestHeader(array $value): Jellyfin
    {
        $this->options['headers'] = array_merge_recursive($this->options['headers'], $value);

        return $this;
    }

    /**
     * Function to remove request header.
     *
     * @param string $key
     * @return Jellyfin
     */
    public function removeRequestHeader(string $key): Jellyfin
    {
        unset($this->options['headers'][$key]);

        return $this;
    }

    /**
     * Return request options header.
     *
     * @param string $key
     *
     * @throws \RuntimeException
     *
     * @return string
     */
    public function getRequestHeader(string $key): string
    {
        if (isset($this->options['headers'][$key])) {
            return $this->options['headers'][$key];
        }

        throw new RuntimeException('Options header is not set.');
    }

    /**
     * Function to add request query.
     *
     * @param string $key
     * @param string $value
     *
     * @return Jellyfin
     */
    public function setRequestQuery(string $key, string $value): Jellyfin
    {
        $this->options['query'][$key] = $value;

        return $this;
    }

    /**
     * Return request options header.
     *
     * @param string $key
     *
     * @throws \RuntimeException
     *
     * @return string
     */
    public function getRequestQuery(string $key): string
    {
        if (isset($this->options['query'][$key])) {
            return $this->options['query'][$key];
        }

        throw new RuntimeException('Options query is not set.');
    }

    /**
     * Function To Set Jellyfin API Configuration.
     *
     * @param array $config
     *
     * @throws \Exception
     */
    private function setConfig(array $config): void
    {
        $apiConfig = function_exists('config') && !empty(config('jellyfin')) ? config('jellyfin') : $config;

        // Set Api Credentials
        $this->setApiCredentials($apiConfig);
    }

    /**
     * @throws RuntimeException
     */
    private function throwConfigurationException()
    {
        throw new RuntimeException('Invalid configuration provided. Please provide valid configuration for Jellyfin API.');
    }
}
