<?php

namespace Hiteshpachpor\KongAdmin\Tests;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Hiteshpachpor\KongAdmin\Api\Consumers;

trait MockConsumerLumen
{
    public function mockKongConsumer()
    {
        $faker = Faker::create();

        $mock = $this->getMockBuilder(Consumers::class)->getMock();

        $mock->expects($this->any())
            ->method('create')
            ->willReturn([]);

        $mock->expects($this->any())
            ->method('generateApiKey')
            ->willReturn([
                'consumer' => [
                    'id' => $faker->uuid,
                ],
                'created_at' => Carbon::now()->toDateTimeString(),
                'key' => $faker->regexify('[A-Za-z0-9]{32}'),
                'ttl' => '100',
            ]);

        $this->app->instance(Consumers::class, $mock);
    }
}
