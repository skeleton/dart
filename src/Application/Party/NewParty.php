<?php

declare(strict_types=1);

namespace Skeleton\Dart\Application\Party;

class NewParty
{
    /** @var null|string */
    public $game;

    /** @var string[]|array */
    public $players;

    public function __construct(?string $game, array $players)
    {
        $this->game = $game;
        $this->players = $players;
    }
}
