<?php

declare(strict_types=1);

namespace Skeleton\Dart\Domain\Party;

use Skeleton\Dart\Domain\Player\PlayersCollection;

class Party
{
    /** @var Type */
    private $type;

    /** @var PlayersCollection */
    private $players;

    private function __construct(Type $type, PlayersCollection $players)
    {
        $this->type = $type;
        $this->players = $players;
    }

    public static function play(Type $type, PlayersCollection $players): Party
    {
        return new self($type, $players);
    }
}
