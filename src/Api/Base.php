<?php

namespace Hiteshpachpor\KongAdmin\Api;

use Hiteshpachpor\KongAdmin\Client\KongClient;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;

class Base
{
    protected $_client;

    public function __construct()
    {
        $this->_client = new KongClient();
    }

    /**
     * @param array|null $payload
     */
    public function formatPayload($payload = null): ?string
    {
        if (! $payload) {
            return null;
        }

        return json_encode($payload, JSON_THROW_ON_ERROR);
    }

    /**
     * @param string $path
     * @param string $payload
     */
    protected function post($path, $payload = null): Response
    {
        return $this->_client->send(
            Request::METHOD_POST,
            $path,
            $this->formatPayload($payload)
        );
    }

    /**
     * @param string $path
     * @param string $payload
     */
    protected function patch($path, $payload): Response
    {
        return $this->_client->send(
            Request::METHOD_PATCH,
            $path,
            $this->formatPayload($payload)
        );
    }
}
