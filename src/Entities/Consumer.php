<?php

namespace Hiteshpachpor\KongAdmin\Entities;

/**
 * Kong Consumer object.
 *
 * @see https://docs.konghq.com/gateway/2.7.x/admin-api/#consumer-object
 */
class Consumer
{
    protected $_username;
    protected $_customId;
    protected $_tags;

    public function __construct($username)
    {
        $this->_username = $username;
    }

    public function getUsername(): string
    {
        return $this->_username;
    }

    public function setUsername($username): Consumer
    {
        $this->_username = $username;

        return $this;
    }

    public function getCustomId(): string
    {
        return $this->_customId;
    }

    public function setCustomId($customId): Consumer
    {
        $this->_customId = $customId;

        return $this;
    }

    public function getTags(): ?array
    {
        return $this->_tags;
    }

    public function setTags($tags): Consumer
    {
        $this->_tags = $tags;

        return $this;
    }

    public function getData(): array
    {
        return [
            'username' => $this->getUsername(),
            'custom_id' => $this->getCustomId(),
            'tags' => $this->getTags(),
        ];
    }
}
