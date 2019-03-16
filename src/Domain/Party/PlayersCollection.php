<?php

declare(strict_types=1);

namespace Skeleton\Dart\Domain\Party;

use Webmozart\Assert\Assert;

class PlayersCollection
{
    /** @var Player[] */
    private $players;

    private function __construct(array $players)
    {
        $this->players = $players;
    }

    public function addPlayer(Player $player)
    {
        $this->players[$player->__toString()] = $player;
    }

    public static function fromPlayers(array $players)
    {
        Assert::allIsInstanceOf($players, Player::class, sprintf('Each player should be an instance of %s', Player::class));

        return new self($players);
    }

    public function __toArray(): array
    {
        return array_map(function (Player $player) {
            return $player->__toString();
        }, $this->players);
    }
}
