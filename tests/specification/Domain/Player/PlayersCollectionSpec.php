<?php

declare(strict_types=1);

namespace specification\Skeleton\Dart\Domain\Player;

use Skeleton\Dart\Domain\Player\Nickname;
use Skeleton\Dart\Domain\Player\Player;
use Skeleton\Dart\Domain\Player\PlayersCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PlayersCollectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(PlayersCollection::class);
    }

    function it_adds_a_player()
    {
        $player = Player::create(Nickname::fromString('skeleton'));
        $this->beConstructedThrough('addPlayer', [$player]);
    }
}
