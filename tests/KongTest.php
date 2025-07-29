<?php

namespace Hiteshpachpor\KongAdmin\Tests;

use Hiteshpachpor\KongAdmin\Kong;
use Hiteshpachpor\KongAdmin\Api\Consumers;
use Hiteshpachpor\KongAdmin\Api\Routes;
use Hiteshpachpor\KongAdmin\Api\Services;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;

class KongTest extends TestCase
{
    private $_kong;

    protected function setUp(): void
    {
        $_consumers = $this->createMock(Consumers::class);
        $_routes = $this->createMock(Routes::class);
        $_services = $this->createMock(Services::class);

        $this->_kong = new Kong(
            $_consumers,
            $_routes,
            $_services
        );
    }

    #[Test]
    public function consumers_return_correct_object_type(): void
    {
        $this->assertInstanceOf(Consumers::class, $this->_kong->consumers());
    }

    #[Test]
    public function routes_return_correct_object_type(): void
    {
        $this->assertInstanceOf(Routes::class, $this->_kong->routes());
    }

    #[Test]
    public function services_return_correct_object_type(): void
    {
        $this->assertInstanceOf(Services::class, $this->_kong->services());
    }
}