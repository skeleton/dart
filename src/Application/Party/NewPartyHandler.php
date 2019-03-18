<?php

namespace Skeleton\Dart\Application\Party;

use Ramsey\Uuid\Uuid;
use Skeleton\Dart\Domain\Party\Identifier;
use Skeleton\Dart\Domain\Party\Party;
use Skeleton\Dart\Domain\Party\PartyRepository;
use Skeleton\Dart\Domain\Party\Game;
use Skeleton\Dart\Domain\Party\Player;
use Skeleton\Dart\Domain\Party\PlayersCollection;

class NewPartyHandler
{
    /** @var PartyRepository */
    private $partyRepository;

    public function __construct(PartyRepository $partyRepository)
    {
        $this->partyRepository = $partyRepository;
    }

    public function __invoke(NewParty $newParty)
    {
        $type = Game::fromString($newParty->game);

        $players = [];
        foreach ($newParty->players as $player) {
            $players[] = Player::fromString($player);
        }

        $players = PlayersCollection::fromPlayers($players);
        $identifier = Identifier::fromString(Uuid::uuid4()->toString());
        $party = Party::play($identifier, $type, $players);
        $this->partyRepository->save($party);
    }
}
