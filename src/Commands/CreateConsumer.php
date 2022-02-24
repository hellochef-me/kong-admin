<?php

namespace Hiteshpachpor\KongAdmin\Commands;

use Hiteshpachpor\KongAdmin\Entities\Consumer;
use Hiteshpachpor\KongAdmin\Kong;

class CreateConsumer
{
    private $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function handle(Kong $kong)
    {
        $consumer = new Consumer($this->data['email']);
        $consumer->setCustomId($this->data['id']);

        // create consumer
        $response = $kong->consumers()->create($consumer);

        return $response;
    }
}
