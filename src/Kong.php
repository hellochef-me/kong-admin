<?php

namespace Hiteshpachpor\KongAdmin;

use Hiteshpachpor\KongAdmin\Api\Consumers;
use Hiteshpachpor\KongAdmin\Api\Routes;
use Hiteshpachpor\KongAdmin\Api\Services;

/**
 * Kong wrapper.
 *
 * @see https://docs.konghq.com/gateway/2.7.x/admin-api/
 */
class Kong
{
    protected $_consumers;
    protected $_routes;
    protected $_services;

    public function __construct(
        Consumers $consumers,
        Routes $routes,
        Services $services
    ) {
        $this->_consumers = $consumers;
        $this->_routes = $routes;
        $this->_services = $services;
    }

    public function consumers(): Consumers
    {
        return $this->_consumers;
    }

    public function routes(): Routes
    {
        return $this->_routes;
    }

    public function services(): Services
    {
        return $this->_services;
    }
}
