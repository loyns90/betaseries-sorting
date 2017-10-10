<?php

namespace Betaseries;

use Betaseries\HttpClient\HttpClient;

class Client
{
    private $options = [
        'base_uri' => 'https://api.betaseries.com/',
    ];

    private $httpClient;

    /**
     * Client constructor.
     * @param Betaseries $betaseries
     */
    public function __construct(Betaseries $betaseries)
    {
        $this->options = array_replace([
            'api_key' => $betaseries->getApiKey(),
            'token' => $betaseries->getToken()
        ], (array) $this->options);
    }

    /**
     * @param $name
     * @return Api\Members|Api\Shows
     */
    public function api($name)
    {
        switch ($name) {
            case 'comments':
                $api = new Api\Comments($this);
                break;
            case 'episodes':
                $api = new Api\Episodes($this);
                break;
            case 'friends':
                $api = new Api\Friends($this);
                break;
            case 'members':
                $api = new Api\Members($this);
                break;
            case 'messages':
                $api = new Api\Messages($this);
                break;
            case 'movies':
                $api = new Api\Movies($this);
                break;
            case 'pictures':
                $api = new Api\Pictures($this);
                break;
            case 'planning':
                $api = new Api\Planning($this);
                break;
            case 'shows':
                $api = new Api\Shows($this);
                break;
            case 'subtitles':
                $api = new Api\Subtitles($this);
                break;
            case 'timeline':
                $api = new Api\Timeline($this);
                break;

            default:
                throw new \InvalidArgumentException(sprintf('Undefined api instance called: "%s"', $name));
        }

        return $api;
    }

    /**
     * @return null|HttpClient
     */
    public function getHttpClient()
    {
        if (null === $this->httpClient) {
            $this->httpClient = new HttpClient($this->options);
        }

        return $this->httpClient;
    }

    /**
     * @param $name
     * @param $args
     * @return mixed
     */
    public function __call($name, $args)
    {
        try {
            return $this->api($name);
        } catch (\InvalidArgumentException $e) {
            throw new \BadMethodCallException(sprintf('Undefined method called: "%s"', $name));
        }
    }
}
