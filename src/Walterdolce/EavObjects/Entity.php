<?php

namespace Walterdolce\EavObjects;

class Entity implements EntityInterface
{
    /**
     * @var int|string $identifier
     */
    private $identifier;

    /**
     * @param int|string $identifier
     */
    public function __construct($identifier)
    {
        if (!$this->isValid($identifier)) {
            $this->throwException($identifier);
        }
        $this->identifier = $identifier;
    }

    /**
     * @return int|string
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @param $identifier
     */
    private function throwException($identifier)
    {
        throw new \InvalidArgumentException(
            sprintf(
                'Entity identifier must be scalar. %s given.',
                ucfirst(gettype($identifier))
            )
        );
    }

    /**
     * @param $identifier
     *
     * @return bool
     */
    private function isValid($identifier)
    {
        return is_int($identifier)
               ||
               (is_string($identifier) && !empty($identifier));
    }
}
