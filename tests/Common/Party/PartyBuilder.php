<?php

declare(strict_types=1);

namespace Skeleton\Dart\Test\Common\Party;

use Ramsey\Uuid\Uuid;
use Skeleton\Dart\Domain\Party\Identifier;
use Skeleton\Dart\Domain\Party\Party;
use Skeleton\Dart\Domain\Party\Type;
use Skeleton\Dart\Domain\Party\Player\Nickname;
use Skeleton\Dart\Domain\Party\Player\Player;
use Skeleton\Dart\Domain\Party\PlayersCollection;

class PartyBuilder
{
    /** @var Identifier */
    private $identifier;

    /** @var Type */
    private $type;

    /** @var PlayersCollection */
    private $players;

    public function __construct()
    {
        $this->identifier = Identifier::fromString(Uuid::uuid4()->toString());
        $this->type = Type::fromString('301');
        $this->players = PlayersCollection::fromPlayers([Player::create(Nickname::fromString('skeleton'))]);
    }

    public function build()
    {
        $party = Party::play($this->identifier, $this->type, $this->players);

        return $party;
    }

    public function withIdentifier(string $identifier): PartyBuilder
    {
        $this->identifier = Identifier::fromString($identifier);

        return $this;
    }

    public function withType(string $type): PartyBuilder
    {
        $this->type = Type::fromString($type);

        return $this;
    }

    public function withPlayers(array $nicknames): PartyBuilder
    {
        $players = [];
        foreach ($nicknames as $nickname) {
            $players[] = Player::create(Nickname::fromString($nickname));
        }

        $this->players = PlayersCollection::fromPlayers($players);

        return $this;
    }
}
