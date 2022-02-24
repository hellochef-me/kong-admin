<?php

namespace Hiteshpachpor\KongAdmin\Entities\Plugin;

use Hiteshpachpor\KongAdmin\Entities\Plugin;

/**
 * Kong Key Authentication plugin.
 *
 * @see https://docs.konghq.com/hub/kong-inc/key-auth/
 */
class KeyAuth extends Plugin
{
    protected $_name = 'key-auth';

    protected $_config = [
        'key_names' => ['apikey'],
        'key_in_body' => false,
        'key_in_header' => true,
        'key_in_query' => false,
        'hide_credentials' => false,
        'run_on_preflight' => true,
    ];
}
