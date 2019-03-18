<?php

declare(strict_types=1);

namespace Skeleton\Dart\Domain\Party;

use Webmozart\Assert\Assert;

class Player
{
    /** @var string */
    private $player;

    private function __construct(string $player)
    {
        Assert::stringNotEmpty($player, 'Player cannot be null');
        Assert::maxLength($player, 100, 'Player is too long. It should have 100 characters or less');
        Assert::notContains($player, ',', 'A player cannot contain "," character');

        $this->player = $player;
    }

    public static function fromString(string $player)
    {
        return new self($player);
    }

    public function __toString(): string
    {
        return $this->player;
    }
}
