<?php

declare(strict_types=1);

namespace Skeleton\Dart\Domain\Party;

class Party
{
    /** @var Identifier */
    private $identifier;

    /** @var Game */
    private $game;

    /** @var PlayersCollection */
    private $players;

    private function __construct(Identifier $identifier, Game $game, PlayersCollection $players)
    {
        $this->identifier = $identifier;
        $this->game = $game;
        $this->players = $players;
    }

    public static function play(Identifier $identifier, Game $game, PlayersCollection $players): Party
    {
        return new self($identifier, $game, $players);
    }

    public function getIdentifier(): Identifier
    {
        return $this->identifier;
    }

    public function getGame(): Game
    {
        return $this->game;
    }

    public function getPlayers(): PlayersCollection
    {
        return $this->players;
    }
}
