<?php

declare(strict_types=1);

namespace Skeleton\Dart\Test\Common\Party;

use Ramsey\Uuid\Uuid;
use Skeleton\Dart\Domain\Party\Identifier;
use Skeleton\Dart\Domain\Party\Party;
use Skeleton\Dart\Domain\Party\Game;
use Skeleton\Dart\Domain\Party\Player;
use Skeleton\Dart\Domain\Party\PlayersCollection;

class PartyBuilder
{
    /** @var Identifier */
    private $identifier;

    /** @var Game */
    private $game;

    /** @var PlayersCollection */
    private $players;

    public function __construct()
    {
        $this->identifier = Identifier::fromString(Uuid::uuid4()->toString());
        $this->game = Game::fromString('301');
        $this->players = PlayersCollection::fromPlayers([Player::fromString('skeleton')]);
    }

    public function build()
    {
        $party = Party::play($this->identifier, $this->game, $this->players);

        return $party;
    }

    public function withIdentifier(string $identifier): PartyBuilder
    {
        $this->identifier = Identifier::fromString($identifier);

        return $this;
    }

    public function withGame(string $game): PartyBuilder
    {
        $this->game = Game::fromString($game);

        return $this;
    }

    public function withPlayers(array $nicknames): PartyBuilder
    {
        $players = [];
        foreach ($nicknames as $nickname) {
            $players[] = Player::fromString($nickname);
        }

        $this->players = PlayersCollection::fromPlayers($players);

        return $this;
    }
}
