<?php

declare(strict_types=1);

namespace Skeleton\Dart\Domain\Party;

use Webmozart\Assert\Assert;

class Game
{
    private const GAME_301 = '301';

    /** @var string */
    private $game;

    private function __construct(string $game)
    {
        Assert::stringNotEmpty($game, 'Game cannot be empty');
        Assert::oneOf($game, [self::GAME_301], sprintf('Game should be one of those value: %s', implode(', ', [self::GAME_301])));

        $this->game = $game;
    }

    public static function fromString(string $game): Game
    {
        return new self($game);
    }

    public function __toString(): string
    {
        return $this->game;
    }
}
