<?php

namespace Hiteshpachpor\KongAdmin\Tests\Entities;

use PHPUnit\Framework\TestCase;
use Hiteshpachpor\KongAdmin\Entities\Route;
use Hiteshpachpor\KongAdmin\Entities\Service;

class RouteTest extends TestCase
{
    protected $route;

    protected function setUp(): void
    {
        parent::setUp();


        $this->route = new Route;
    }

    /** @test */
    public function route_name_can_be_set(): void
    {
        $this->route->setName('route1');
        $this->assertEquals('route1', $this->route->getName());
    }

    /** @test */
    public function route_methods_can_be_set(): void
    {
        $methods = ['GET', 'POST'];

        $this->route->setMethods($methods);
        $this->assertEquals($methods, $this->route->getMethods());
    }

    /** @test */
    public function route_non_array_hosts_can_be_set(): void
    {
        $hosts = 'www.hellochef.me';
        $expected = ['www.hellochef.me'];

        $this->route->setHosts($hosts);
        $this->assertSame($expected, $this->route->getHosts());
    }

    /** @test */
    public function route_hosts_can_be_set(): void
    {
        $hosts = ['https://hellochef.com', 'www.hellochef.me'];
        $expected = ['hellochef.com', 'www.hellochef.me'];

        $this->route->setHosts($hosts);
        $this->assertSame($expected, $this->route->getHosts());
    }

    /** @test */
    public function route_paths_can_be_set(): void
    {
        $paths = ['/recipes', '/recipes/1'];

        $this->route->setPaths($paths);
        $this->assertEquals($paths, $this->route->getPaths());
    }

    /** @test */
    public function route_service_can_be_set(): void
    {
        $service = new Service('service-name');

        $this->route->setService($service);
        $this->assertSame($service, $this->route->getService());
    }

    /** @test */
    public function route_regex_priority_can_be_set(): void
    {

        $scenarios = [
            [
                'priority' => -1,
                'expected' => -1,
            ],
            [
                'priority' => 0,
                'expected' => 0,
            ],
            [
                'priority' => 1,
                'expected' => 1,
            ],
            [
                'priority' => '2',
                'expected' => 2,
            ],
            [
                'priority' => false,
                'expected' => 0,
            ],
        ];

        foreach ($scenarios as $scenario) {
            $this->route->setRegexPriority($scenario['priority']);
            $this->assertSame($scenario['expected'], $this->route->getRegexPriority());
        }
    }

    /** @test */
    public function route_host_can_be_preserved(): void
    {
        $this->route->setPreserveHost(true);
        $this->assertTrue(true, $this->route->getPreserveHost());
    }

    /** @test */
    public function route_get_data(): void
    {
        $host = 'https://hellochef.com';

        // prepare service
        $service = new Service('service-name');
        $service->setHost($host);
        $service->setPort(1994);

        // prepare route
        $this->route->setName('route1');
        $this->route->setMethods(['GET', 'POST']);
        $this->route->setHosts([$host]);
        $this->route->setPaths(['/recipes', '/recipes/1']);
        $this->route->setService($service);

        $expectedData = [
            'name' => 'route1',
            'methods' => ['GET', 'POST'],
            'hosts' => ['hellochef.com'],
            'paths' => ['/recipes', '/recipes/1'],
            'service' => $service->getData(),
            'regex_priority' => 0,
            'strip_path' => false,
            'preserve_host' => true,
        ];

        $this->assertSame($expectedData, $this->route->getData());
    }
}