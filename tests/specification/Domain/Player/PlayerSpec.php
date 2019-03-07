<?php

declare(strict_types=1);

namespace specification\Skeleton\Dart\Domain\Player;

use Prophecy\Argument;
use Skeleton\Dart\Domain\Player\Nickname;
use Skeleton\Dart\Domain\Player\Player;
use PhpSpec\ObjectBehavior;

class PlayerSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('create', [Nickname::fromString('skeleton')]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Player::class);
    }

    function it_has_a_nickname()
    {
        $this->nickname()->shouldReturnAnInstanceOf(Nickname::class);
    }
}
