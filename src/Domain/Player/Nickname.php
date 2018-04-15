<?php

namespace Skeleton\Dart\Domain\Player;

/**
 * Nickname of the player
 */
class Nickname
{
    /** @var string|null */
    private $nickname;

    private function __construct(?string $nickname)
    {
        if (null === $nickname || '' === $nickname) {
            throw new \InvalidArgumentException('Nickname cannot be null');
        }

        if (strlen($nickname) > 100) {
            throw new \InvalidArgumentException('Nickname is too long. It should have 100 characters or less');
        }

        $this->nickname = $nickname;
    }

    public static function fromString(?string $nickname)
    {
        return new self($nickname);
    }

    public function __toString(): string
    {
        return $this->nickname;
    }
}
