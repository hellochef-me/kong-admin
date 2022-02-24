<?php

namespace Hiteshpachpor\KongAdmin\Entities;

/**
 * Kong Service object.
 *
 * @see https://docs.konghq.com/gateway/2.7.x/admin-api/#service-object
 */
class Service
{
    protected $_name;
    protected $_host;
    protected $_port;

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function getName(): string
    {
        return $this->_name;
    }

    public function setName($name): Service
    {
        $this->_name = $name;

        return $this;
    }

    public function getHost(): string
    {
        return $this->_host;
    }

    public function setHost($host): Service
    {
        $this->_host = $host;

        return $this;
    }

    public function getPort(): int
    {
        return $this->_port;
    }

    public function setPort($port): Service
    {
        $this->_port = $port;

        return $this;
    }

    public function getData(): array
    {
        return [
            'name' => $this->getName(),
            'host' => $this->getHost(),
            'port' => $this->getPort(),
        ];
    }
}
