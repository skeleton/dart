<?php

namespace specification\Skeleton\Dart\Domain\Player;

use Skeleton\Dart\Domain\Player\Nickname;
use PhpSpec\ObjectBehavior;

class NicknameSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('fromString', ['skeleton']);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Nickname::class);
    }

    function it_transforms_it_into_string()
    {
        $this->__toString()->shouldReturn('skeleton');
    }

    function it_throws_an_exception_if_nickname_is_null()
    {
        $this->beConstructedThrough('fromString', [null]);

        $this->shouldThrow(new \InvalidArgumentException('Nickname cannot be null'))->duringInstantiation();
    }

    function it_throws_an_exception_if_nickname_is_empty()
    {
        $this->beConstructedThrough('fromString', ['']);

        $this->shouldThrow(new \InvalidArgumentException('Nickname cannot be null'))->duringInstantiation();
    }

    function it_throws_an_exception_if_nickname_is_longer_than_100_characters()
    {
        $nickname = str_pad('a', 101, 'a');
        $this->beConstructedThrough('fromString', [$nickname]);

        $this->shouldThrow(
            new \InvalidArgumentException('Nickname is too long. It should have 100 characters or less')
        )->duringInstantiation();
    }
}
