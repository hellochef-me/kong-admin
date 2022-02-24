<?php

namespace Hiteshpachpor\KongAdmin\Entities;

use Hiteshpachpor\KongAdmin\Interfaces\PluginInterface;

/**
 * Kong Plugin object.
 *
 * @see https://docs.konghq.com/gateway/2.7.x/admin-api/#plugin-object
 */
abstract class Plugin implements PluginInterface
{
    /**
     * Name of the plugin e.g. `key-auth`, `acl`.
     */
    protected $_name;

    /**
     * An array of configuration options for the plugin.
     */
    protected $_config;

    public function __construct($config = [])
    {
        $this->setConfig($config);
    }

    public function getName(): string
    {
        return $this->_name;
    }

    public function setName($name): Plugin
    {
        $this->_name = $name;

        return $this;
    }

    public function getConfig(): array
    {
        return $this->_config;
    }

    public function setConfig($config = []): Plugin
    {
        $this->_config = array_merge($this->_config, $config);

        return $this;
    }

    public function setConfigOption($option = '', $value = null): Plugin
    {
        $this->_config[$option] = $value;

        return $this;
    }

    public function getData(): array
    {
        return [
            'name' => $this->getName(),
            'config' => $this->getConfig(),
        ];
    }
}
