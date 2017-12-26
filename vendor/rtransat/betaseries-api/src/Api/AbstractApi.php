<?php

namespace Betaseries\Api;

use Betaseries\Client;

abstract class AbstractApi
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $path
     * @param array $parameters
     * @param array $headers
     * @return mixed
     */
    protected function get($path, array $parameters = [], $headers = array())
    {
        $response = $this->getClient()->getHttpClient()->get($path, $parameters, $headers);

        if (isset($headers['Content-Type']) && $headers['Content-Type'] == 'image/jpeg') {
            return base64_encode($response->getBody());
        }
        return json_decode($response->getBody(), true);
    }

    /**
     * @param  string $path
     * @param  null $postBody
     * @param  bool $multiparts
     * @param  array $parameters
     * @param  array $headers
     * @return mixed
     */
    protected function post($path, $postBody = null, $multiparts = false, array $parameters = [], array $headers = [])
    {
        $response = $this->getClient()->getHttpClient()->post($path, $postBody, $multiparts, $parameters, $headers);
        return json_decode($response->getBody(), true);
    }

    /**
     * @param string $path
     * @param null $postBody
     * @param array $parameters
     * @param array $headers
     * @return mixed
     */
    protected function put($path, $postBody = null, array $parameters = [], array $headers = [])
    {
        $response = $this->getClient()->getHttpClient()->put($path, $postBody, $parameters, $headers);
        return json_decode($response->getBody(), true);
    }

    /**
     * @param string $path
     * @param null $postBody
     * @param array $parameters
     * @param array $headers
     * @return mixed
     */
    protected function delete($path, $postBody = null, array $parameters = [], array $headers = [])
    {
        $response = $this->getClient()->getHttpClient()->delete($path, $postBody, $parameters, $headers);
        return json_decode($response->getBody(), true);
    }

    /**
     * @return Client
     */
    protected function getClient()
    {
        return $this->client;
    }
}
