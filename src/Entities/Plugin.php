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
     * ID of the plugin.
     */
    protected $_id;

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

    public function getId(): null|string
    {
        return $this->_id;
    }

    public function setId($id): Plugin
    {
        $this->_id = $id;

        return $this;
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

    /**
     * @return mixed|null
     */
    public function getConfigOption($option)
    {
        if (array_key_exists($option, $this->_config)) {
            return $this->_config[$option];
        }

        return;
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
