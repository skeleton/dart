<?php

declare(strict_types=1);

namespace Skeleton\Dart\Application\Party;

class NewParty
{
    /** @var null|string */
    public $type;

    /** @var string[]|array */
    public $players;

    public function __construct(?string $type, array $players)
    {
        $this->type = $type;
        $this->players = $players;
    }
}
