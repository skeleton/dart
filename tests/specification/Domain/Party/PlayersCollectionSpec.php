<?php

declare(strict_types=1);

namespace specification\Skeleton\Dart\Domain\Party;

use Skeleton\Dart\Domain\Party\Player;
use Skeleton\Dart\Domain\Party\PlayersCollection;
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
        $player = Player::fromString('skeleton');
        $this->beConstructedThrough('addPlayer', [$player]);
    }

    function it_returns_players()
    {
        $skeleton = Player::fromString('skeleton');
        $krevindiou = Player::fromString('krevindiou');
        $this->beConstructedThrough('fromPlayers', [[$skeleton, $krevindiou]]);

        $this->__toArray()->shouldReturn(['skeleton', 'krevindiou']);
    }
}
