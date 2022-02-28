<?php

namespace Hiteshpachpor\KongAdmin\Entities\Plugin;

use Hiteshpachpor\KongAdmin\Entities\Plugin;

/**
 * Kong ACL plugin.
 *
 * @see https://docs.konghq.com/hub/kong-inc/acl/
 */
class ACL extends Plugin
{
    protected $_name = 'acl';

    protected $_config = [
        'hide_groups_header' => false,
    ];

    /**
     * @param string|array $groups
     * @return this
     */
    public function allow($groups)
    {
        return $this->action('allow', $groups);
    }

    /**
     * @param string|array $groups
     * @return this
     */
    public function deny($groups)
    {
        return $this->action('deny', $groups);
    }

    /**
     * @param string $action
     * @param string|array $groups
     * @return this
     */
    protected function action($action, $groups)
    {
        if (! is_array($groups)) {
            $groups = [$groups];
        }

        $this->setConfigOption($action, array_merge(
            $this->getConfigOption($action) ?? [],
            $groups
        ));

        return $this;
    }
}
