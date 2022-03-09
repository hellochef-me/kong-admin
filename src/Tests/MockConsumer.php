<?php

namespace Hiteshpachpor\KongAdmin\Tests;

use Carbon\Carbon;
use Hiteshpachpor\KongAdmin\Api\Consumers;
use Mockery\MockInterface;

trait MockConsumer
{
    public function mockKongConsumer()
    {
        $this->mock(Consumers::class, function (MockInterface $mock) {
            $mock->shouldReceive('create', 'update', 'addACL')->zeroOrMoreTimes()->andReturn([]);

            $mock->shouldReceive('generateApiKey')
                ->zeroOrMoreTimes()
                ->andReturnUsing(function ($args) {
                    return [
                        'consumer' => [
                            'id' => $this->faker->uuid,
                        ],
                        'created_at' => Carbon::now()->toDateTimeString(),
                        'key' => $this->faker->regexify('[A-Za-z0-9]{32}'),
                        'ttl' => '100',
                    ];
                });
        });
    }
}
