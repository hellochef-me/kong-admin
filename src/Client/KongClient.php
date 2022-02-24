<?php

namespace Hiteshpachpor\KongAdmin\Client;

use Illuminate\Support\Facades\Http;

/**
 * Kong API client.
 *
 * @see https://docs.konghq.com/gateway/2.7.x/admin-api/
 */
class KongClient
{
    protected $http;
    protected $baseUrl;

    public function __construct()
    {
        $this->http = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->baseUrl($this->getBaseUrl());
    }

    public function getBaseUrl(): string
    {
        return config('services.kong.admin_url');
    }

    /**
     * @throws \Illuminate\Http\Client\RequestException
     * @throws \Exception
     */
    public function send(string $method, string $uri, string $body)
    {
        $options = [
            'body' => $body,
        ];

        return $this->http->send($method, $uri, $options)->throw();
    }
}
