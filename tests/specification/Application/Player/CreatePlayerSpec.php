<?php

namespace specification\Skeleton\Dart\Application\Player;

use Skeleton\Dart\Application\Player\CreatePlayer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CreatePlayerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('skeleton');
        $this->shouldHaveType(CreatePlayer::class);
    }
}
