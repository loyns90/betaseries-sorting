<?php

namespace Betaseries\HttpClient;

use GuzzleHttp\Client;

class HttpClient
{
    protected $options = [
        'base_uri' => 'https://api.betaseries.com/',
    ];

    protected $userAgent = 'php-betaseries-api (https://github.com/florentsorel/php-betaseries-api)';

    protected $apiVersion = '2.4';

    protected $headers = array();

    /**
     * @param array $options
     */
    public function __construct(array $options = array())
    {
        $this->options = array_merge($this->options, $options);
        $this->client = new Client($this->options);

        $this->clearHeaders();
    }

    /**
     * Défini des headers par défaut
     */
    public function clearHeaders()
    {
        $this->headers = array(
            'Accept' => [
                'application/json',
                'image/jpeg'
            ],
            'User-Agent' => $this->userAgent,
            'X-BetaSeries-Version' => $this->apiVersion,
            'X-BetaSeries-Key' => $this->options['api_key'],
        );

        if (isset($this->options['token']) && $this->options['token'] != null) {
            $this->headers += array(
                'X-BetaSeries-Token' => $this->options['token']
            );
        }
    }

    /**
     * @param $path
     * @param array $parameters
     * @param array $headers
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function get($path, array $parameters = [], array $headers = [])
    {
        return $this->request($path, 'GET', $headers, $parameters);
    }

    /**
     * @param $path
     * @param $body
     * @param array $parameters
     * @param array $headers
     * @param bool $multiparts
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function post($path, $body, $multiparts = false, array $parameters = [], array $headers = [])
    {
        return $this->request($path, 'POST', $headers, $parameters, $body, $multiparts);
    }

    public function put($path, $body, array $parameters = [], array $headers = [])
    {
        return $this->request($path, 'PUT', $headers, $parameters, $body);
    }

    public function delete($path, $body, array $parameters = [], array $headers = [])
    {
        return $this->request($path, 'DELETE', $headers, $parameters, $body);
    }

    /**
     * @param $path
     * @param string $httpMethod
     * @param array $headers
     * @param array $options
     * @param null $body
     * @param bool $multiparts
     * @return \GuzzleHttp\Psr7\Response|mixed
     */
    public function request($path, $httpMethod = 'GET', array $headers = array(), array $options = array(), $body = null, $multiparts = false)
    {
        if ($options) {
            $query = http_build_query($options);
            if (strpos($path, '?') !== false) {
                $path = $path . '&' . $query;
            } else {
                $path = $path . '?' . $query;
            }
        }

        $type = 'form_params';

        if ($multiparts) {
            $type = 'multipart';
        }

        return $this->client->request($httpMethod, $path, [
            'headers' => array_merge($this->headers, $headers),
            $type => $body,
        ]);
    }
}
