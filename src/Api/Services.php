<?php

namespace Hiteshpachpor\KongAdmin\Api;

use Hiteshpachpor\KongAdmin\Entities\Plugin;
use Hiteshpachpor\KongAdmin\Entities\Service;
use Illuminate\Http\Client\Response;

class Services extends Base
{
    /**
     * @param Service $service
     */
    public function create($service): Response
    {
        return $this->post('services', $service->getData());
    }

    /**
     * @param Service $service
     * @param Plugin $plugin
     */
    public function enablePlugin($service, $plugin): Response
    {
        return $this->post("services/{$service->getName()}/plugins", $plugin->getData());
    }

    /**
     * @param Service $service
     * @param Plugin $plugin
     */
    public function updatePlugin($service, $plugin): Response
    {
        return $this->patch("services/{$service->getName()}/plugins/{$plugin->getId()}", $plugin->getData());
    }

    /**
     * @param Service $service
     */
    public function listPlugins($service): Response
    {
        return $this->get("services/{$service->getName()}/plugins");
    }

    /**
     * @param Service $service
     * @param string $name
     */
    public function getPluginId($service, $name): null|string
    {
        $plugins = $this->listPlugins($service);

        foreach ($plugins['data'] as $plugin) {
            if ($plugin['name'] == $name) {
                return $plugin['id'];
            }
        }

        return null;
    }
}
