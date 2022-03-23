<?php

namespace Hiteshpachpor\KongAdmin\Entities\Plugin;

use Hiteshpachpor\KongAdmin\Entities\Plugin;

/**
 * Kong CORS plugin.
 *
 * @see https://docs.konghq.com/hub/kong-inc/cors/
 */
class CORS extends Plugin
{
    protected $_name = 'cors';

    protected $_config = [
        'origins' => [
            '*',
        ],
        'headers' => [
            'Accept',
            'Accept-Version',
            'Content-Length',
            'Content-MD5',
            'Content-Type',
            'Date',
            'X-Auth-Token',
            'apikey',
        ],
        'exposed_headers' => [
            'Content-Disposition',
        ],
        'credentials' => true,
        'max_age' => 3600,
        'preflight_continue' => false,
    ];

    /**
     * @param array
     * @return this
     */
    public function addHeaders($headers = [])
    {
        foreach ($headers as $header) {
            $this->_config['headers'][] = $header;
        }

        return $this;
    }
}
