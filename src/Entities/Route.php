<?php

namespace Hiteshpachpor\KongAdmin\Entities;

/**
 * Kong Route object.
 *
 * @see https://docs.konghq.com/gateway/2.7.x/admin-api/#route-object
 */
class Route
{
    protected $_name;
    protected $_methods;
    protected $_paths;
    protected $_service;

    public function __construct()
    {
        //
    }

    public function getName(): string
    {
        return $this->_name;
    }

    public function setName($name): Route
    {
        $this->_name = $name;

        return $this;
    }

    public function getMethods(): array
    {
        return $this->_methods;
    }

    public function setMethods($methods): Route
    {
        $this->_methods = $methods;

        return $this;
    }

    public function getPaths(): array
    {
        return $this->_paths;
    }

    public function setPaths($paths): Route
    {
        $this->_paths = $paths;

        return $this;
    }

    public function getService(): Service
    {
        return $this->_service;
    }

    public function setService($service): Route
    {
        $this->_service = $service;

        return $this;
    }

    public function getData(): array
    {
        return [
            'name' => $this->getName(),
            'methods' => $this->getMethods(),
            'paths' => $this->getPaths(),
            'service' => $this->getService()->getData(),
            'strip_path' => false,
        ];
    }
}
