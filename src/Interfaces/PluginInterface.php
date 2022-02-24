<?php

namespace Hiteshpachpor\KongAdmin\Interfaces;

use Hiteshpachpor\KongAdmin\Entities\Plugin;

interface PluginInterface
{
    public function getName(): string;

    public function setName($name): Plugin;

    public function getConfig(): array;

    public function setConfig($config = []): Plugin;

    public function setConfigOption($option = '', $value = null): Plugin;

    public function getData(): array;
}
