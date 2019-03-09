<?php

declare(strict_types=1);

namespace Skeleton\Dart\Domain\Party;

use Skeleton\Dart\Domain\Party\PlayersCollection;

class Party
{
    /** @var Identifier */
    private $identifier;

    /** @var Type */
    private $type;

    /** @var PlayersCollection */
    private $players;

    private function __construct(Identifier $identifier, Type $type, PlayersCollection $players)
    {
        $this->identifier = $identifier;
        $this->type = $type;
        $this->players = $players;
    }

    public static function play(Identifier $identifier, Type $type, PlayersCollection $players): Party
    {
        return new self($identifier, $type, $players);
    }

    public function getIdentifier(): Identifier
    {
        return $this->identifier;
    }

    public function getType(): Type
    {
        return $this->type;
    }

    public function getPlayers(): PlayersCollection
    {
        return $this->players;
    }
}
