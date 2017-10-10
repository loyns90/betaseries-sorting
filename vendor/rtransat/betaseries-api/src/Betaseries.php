<?php

namespace Betaseries;

class Betaseries
{
    private $api_key;

    private $token;

    /**
     * @param string $api_key
     * @param string|null $token
     */
    public function __construct($api_key, $token = null)
    {
        $this->api_key = $api_key;
        $this->token = $token;
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->api_key;
    }

    /**
     * @return null|string
     */
    public function getToken()
    {
        return $this->token;
    }
}
