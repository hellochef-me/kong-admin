<?php

namespace Hiteshpachpor\KongAdmin\Api;

use Hiteshpachpor\KongAdmin\Entities\Route;
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
     * @param Plugin $plugin
     */
    public function enablePlugin($route, $plugin): Response
    {
        return $this->post("routes/{$route->getName()}/plugins", $plugin->getData());
    }
}
