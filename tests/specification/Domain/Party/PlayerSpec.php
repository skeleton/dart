<?php

declare(strict_types=1);

namespace specification\Skeleton\Dart\Domain\Party;

use Prophecy\Argument;
use PhpSpec\ObjectBehavior;
use Skeleton\Dart\Domain\Party\Player;

class PlayerSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('fromString', ['skeleton']);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Player::class);
    }

    function it_returns_a_player()
    {
        $this->__toString()->shouldReturn('skeleton');
    }
}
