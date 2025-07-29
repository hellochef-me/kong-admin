<?php

namespace Hiteshpachpor\KongAdmin\Tests\Entities;

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use Hiteshpachpor\KongAdmin\Entities\Route;
use Hiteshpachpor\KongAdmin\Entities\Service;

class ServiceTest extends TestCase
{
    protected $service;

    protected function setUp(): void
    {
        parent::setUp();


        $this->service = new Service('new-service');
    }

    #[Test]
    public function service_name_can_be_set(): void
    {
        $this->service->setName('service-1');
        $this->assertEquals('service-1', $this->service->getName());
    }

    #[Test]
    public function service_host_can_be_set(): void
    {
        $this->service->setHost('my-host');
        $this->assertEquals('my-host', $this->service->getHost());
    }

    #[Test]
    public function service_port_can_be_set(): void
    {
        $this->service->setPort(1994);
        $this->assertEquals(1994, $this->service->getPort());
    }

    #[Test]
    public function service_data(): void
    {
        $this->service->setName('another service');
        $this->service->setHost('another host');
        $this->service->setPort(1995);

        $expected = [
            'name' => 'another service',
            'host' => 'another host',
            'port' => 1995,
        ];
        $this->assertEquals($expected, $this->service->getData());
    }
}