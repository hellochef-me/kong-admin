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
    protected $_hosts;
    protected $_paths;
    protected $_service;
    protected $_regexPriority = 0;
    protected $_preserveHost = true;

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

    public function getHosts(): array
    {
        return $this->_hosts;
    }

    public function setHosts($hosts): Route
    {
        if (! is_array($hosts)) {
            $hosts = [$hosts];
        }

        /**
         * If host is https://www.example.com, then set it as www.example.com
         * If host is www.example.com, then set it as is
         */
        foreach ($hosts as $host) {
            $host = parse_url($host);
            $this->_hosts[] = $host['host'] ?? $host['path'];
        }

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

    public function getRegexPriority(): int
    {
        return $this->_regexPriority;
    }

    public function setRegexPriority($regexPriority): Route
    {
        $this->_regexPriority = $regexPriority;

        return $this;
    }

    public function getPreserveHost(): bool
    {
        return $this->_preserveHost;
    }

    public function setPreserveHost($preserveHost): Route
    {
        $this->_preserveHost = $preserveHost;

        return $this;
    }

    public function getData(): array
    {
        return [
            'name' => $this->getName(),
            'methods' => $this->getMethods(),
            'hosts' => $this->getHosts(),
            'paths' => $this->getPaths(),
            'service' => $this->getService()->getData(),
            'regex_priority' => $this->getRegexPriority(),
            'strip_path' => false,
            'preserve_host' => $this->getPreserveHost(),
        ];
    }
}
