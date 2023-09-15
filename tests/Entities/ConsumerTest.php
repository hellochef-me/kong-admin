<?php

namespace Hiteshpachpor\KongAdmin\Tests\Entities;

use PHPUnit\Framework\TestCase;
use Hiteshpachpor\KongAdmin\Entities\Consumer;

class ConsumerTest extends TestCase
{
    private $consumer;

    protected function setUp(): void
    {
        $this->consumer = new Consumer('username');
    }

    /** @test */
    public function consumer_username_is_required(): void
    {
        $this->assertEquals('username', $this->consumer->getUsername());
    }

    /** @test */
    public function consumer_username_can_be_set(): void
    {
        $this->consumer->setUsername('new username');
        $this->assertEquals('new username', $this->consumer->getUsername());
    }

    /** @test */
    public function consumer_custom_id_can_be_set(): void
    {
        $this->consumer->setCustomId(1234);
        $this->assertEquals('1234', $this->consumer->getCustomId());
    }

    /** @test */
    public function consumer_tags_can_be_set(): void
    {
        $this->assertNull($this->consumer->getTags());

        $this->consumer->setTags(['tag1','tag2']);
        $this->assertEquals(['tag1','tag2'], $this->consumer->getTags());
    }

    /** @test */
    public function consumer_data(): void
    {
        $this->consumer->setUsername('username');
        $this->consumer->setCustomId(4321);
        $this->consumer->setTags(['first tag', 'another tag']);

        $expectedData = [
            'username' => $this->consumer->getUsername(),
            'custom_id' => $this->consumer->getCustomId(),
            'tags' => $this->consumer->getTags(),
        ];

        $this->assertEquals($expectedData, $this->consumer->getData());
    }
}