<?php

namespace Hiteshpachpor\KongAdmin\Api;

use Hiteshpachpor\KongAdmin\Entities\Consumer;

class Consumers extends Base
{
    /**
     * Default ttl for api keys is set to 6 months.
     */
    const DEFAULT_TTL = 15552000;

    /**
     * @param Consumer $consumer
     * @return mixed
     */
    public function create($consumer)
    {
        return $this->post('consumers', $consumer->getData())->json();
    }

    /**
     * @param mixed $identifier
     * @param Consumer $consumer
     * @return mixed
     */
    public function update($identifier, Consumer $consumer)
    {
        return $this->patch("consumers/{$identifier}", $consumer->getData())->json();
    }

    /**
     * @param mixed $identifier
     * @return mixed
     */
    public function generateApiKey($identifier, $ttl = self::DEFAULT_TTL)
    {
        return $this->post("consumers/{$identifier}/key-auth", [
            'ttl' => $ttl,
        ])->json();
    }
}
