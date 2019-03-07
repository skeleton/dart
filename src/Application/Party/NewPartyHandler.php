<?php

namespace Skeleton\Dart\Application\Party;

use Skeleton\Dart\Domain\Party\Party;
use Skeleton\Dart\Domain\Party\Type;
use Skeleton\Dart\Domain\Player\Nickname;
use Skeleton\Dart\Domain\Player\Player;
use Skeleton\Dart\Domain\Player\PlayersCollection;

class NewPartyHandler
{
    public function __invoke(NewParty $newParty)
    {
        $type = Type::fromString($newParty->type);

        $players = [];
        foreach ($newParty->players as $player) {
            $players[] = Player::create(Nickname::fromString($player));
        }

        $players = PlayersCollection::fromPlayers($players);
        $party = Party::play($type, $players);
    }
}