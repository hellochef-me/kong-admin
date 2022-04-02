<?php

namespace Hiteshpachpor\KongAdmin\Api;

use Hiteshpachpor\KongAdmin\Entities\Plugin;
use Hiteshpachpor\KongAdmin\Entities\Route;
use Hiteshpachpor\KongAdmin\Entities\Service;
use Illuminate\Http\Client\Response;

class Routes extends Base
{
    /**
     * @param Route $route
     */
    public function create($route): Response
    {
        return $this->post("services/{$route->getService()->getName()}/routes", $route->getData());
    }

    /**
     * @param Route $route
     */
    public function update($route): Response
    {
        return $this->patch("routes/{$route->getName()}", $route->getData());
    }

    /**
     * @param Route $route
     */
    public function show($route): Response
    {
        return $this->get("routes/{$route->getName()}");
    }

    /**
     * @param Route $route
     * @param Service|null $service
     */
    public function drop($route, $service = null): Response
    {
        $url = "routes/{$route->getName()}";

        if ($service) {
            $url = "services/{$service->getName()}/{$url}";
        }

        return $this->delete($url);
    }

    /**
     * @param Service $service
     * @param string|null $offset
     */
    public function list($service, $offset = null): Response
    {
        $base = "services/{$service->getName()}/routes";
        $url = $offset ? "{$base}?offset={$offset}" : $base;

        return $this->get($url);
    }

    /**
     * @param Route $route
     * @param Plugin $plugin
     */
    public function enablePlugin($route, $plugin): Response
    {
        return $this->post("routes/{$route->getName()}/plugins", $plugin->getData());
    }
}
