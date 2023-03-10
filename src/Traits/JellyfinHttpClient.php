<?php

namespace Havenstd06\LaravelJellyfin\Traits;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException as HttpClientException;
use GuzzleHttp\Utils;
use Psr\Http\Message\StreamInterface;
use RuntimeException;
use SimpleXMLElement;

trait JellyfinHttpClient
{
    /**
     * Http Client class object.
     *
     * @var HttpClient
     */
    private HttpClient $client;

    /**
     * Http Client configuration.
     *
     * @var array
     */
    private array $httpClientConfig;

    /**
     * Jellyfin API Base URL.
     *
     * @var string
     */
    protected string $apiBaseUrl;

    /**
     * Jellyfin API Endpoint.
     *
     * @var string
     */
    private string $apiUrl;

    /**
     * Jellyfin API Endpoint.
     *
     * @var string
     */
    private string $apiEndPoint;

    /**
     * Http Client request body parameter name.
     *
     * @var string
     */
    private string $httpBodyParam;

    /**
     * Validate SSL details when creating HTTP client.
     *
     * @var bool
     */
    private bool $validateSSL;

    /**
     * Request type.
     *
     * @var string
     */
    protected string $verb = 'get';

    /**
     * Set curl constants if not defined.
     *
     * @return void
     */
    protected function setCurlConstants(): void
    {
        $constants = [
            'CURLOPT_SSLVERSION'        => 32,
            'CURL_SSLVERSION_TLSv1_2'   => 6,
            'CURLOPT_SSL_VERIFYPEER'    => 64,
            'CURLOPT_SSLCERT'           => 10025,
        ];

        foreach ($constants as $key => $item) {
            $this->defineCurlConstant($key, $item);
        }
    }

    /**
     * Declare a curl constant.
     *
     * @param string $key
     * @param string $value
     *
     * @return bool|string
     */
    protected function defineCurlConstant(string $key, string $value): bool|string
    {
        return defined($key) ? true : define($key, $value);
    }

    /**
     * Function to initialize/override Http Client.
     *
     * @param HttpClient|null $client
     *
     * @return void
     */
    public function setClient(HttpClient $client = null): void
    {
        if ($client instanceof HttpClient) {
            $this->client = $client;

            return;
        }

        $this->client = new HttpClient([
            'curl' => $this->httpClientConfig,
        ]);
    }

    /**
     * Function to set Http Client configuration.
     *
     * @return void
     */
    protected function setHttpClientConfiguration(): void
    {
        $this->setCurlConstants();

        $this->httpClientConfig = [
            CURLOPT_SSLVERSION     => CURL_SSLVERSION_TLSv1_2,
            CURLOPT_SSL_VERIFYPEER => $this->validateSSL,
        ];

        // Set default values.
        $this->setDefaultValues();

        // Initialize Http Client
        $this->setClient();
    }

    /**
     * Set default values for configuration.
     *
     * @return void
     */
    private function setDefaultValues(): void
    {
        $validateSSL = empty($this->validateSSL) ? true : $this->validateSSL;
        $this->validateSSL = $validateSSL;

        $this->apiBaseUrl = $this->config['server_api_url'];
    }

    /**
     * Perform Jellyfin API request & return response.
     *
     * @throws \Throwable
     *
     * @return StreamInterface
     */
    private function makeHttpRequest(): StreamInterface
    {
        return $this->client->{$this->verb}(
            $this->apiUrl,
            $this->options
        )->getBody();
    }

    /**
     * Function To Perform Jellyfin API Request.
     *
     * @param bool $decode
     *
     * @throws \Throwable
     *
     * @return array|StreamInterface|string
     */
    private function doJellyfinRequest(bool $decode = true): StreamInterface|array|string
    {
        try {
            $this->apiUrl = collect([$this->apiBaseUrl, $this->apiEndPoint])->implode('/');

            // Perform Jellyfin HTTP API request.
            $response = $this->makeHttpRequest();

            $data = $response->getContents();

            return ($decode === false) ? $data : Utils::jsonDecode($data, true);
        } catch (RuntimeException $t) {
            return $t->getMessage();
        }
    }
}
