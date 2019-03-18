<?php

declare(strict_types=1);

namespace specification\Skeleton\Dart\Domain\Party;

use Skeleton\Dart\Domain\Party\Game;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GameSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('fromString', ['301']);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Game::class);
    }

    function it_transforms_it_into_string()
    {
        $this->__toString()->shouldReturn('301');
    }

    public function it_throws_an_exception_if_game_is_empty()
    {
        $this->shouldThrow('\InvalidArgumentException')->during('fromString', ['']);
    }

    public function it_throws_an_exception_if_game_is_not_in_defined_list()
    {
        $this->shouldThrow('\InvalidArgumentException')->during('fromString', ['other']);
    }
}
