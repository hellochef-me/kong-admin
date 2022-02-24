<?php

namespace Hiteshpachpor\KongAdmin\Commands;

use Hiteshpachpor\KongAdmin\Kong;

class LoginConsumer
{
    private $data;

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    public function handle(Kong $kong)
    {
        // @todo what if the consumer does not exist on Kong yet?
        // @todo refactor the commands to remove duplicate code

        // create an api key
        $kongApiKey = $kong->consumers()
            ->generateApiKey($this->data['email'], $this->data['ttl']);

        return $kongApiKey;
    }
}
