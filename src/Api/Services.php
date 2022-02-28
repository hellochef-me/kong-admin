<?php

namespace Hiteshpachpor\KongAdmin\Api;

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
     * @param Route $route
     * @param Plugin $plugin
     */
    public function enablePlugin($route, $plugin): Response
    {
        return $this->post("services/{$route->getName()}/plugins", $plugin->getData());
    }
}
