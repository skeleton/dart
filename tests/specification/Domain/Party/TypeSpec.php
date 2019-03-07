<?php

declare(strict_types=1);

namespace specification\Skeleton\Dart\Domain\Party;

use Skeleton\Dart\Domain\Party\Type;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TypeSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('fromString', ['301']);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Type::class);
    }

    function it_transforms_it_into_string()
    {
        $this->__toString()->shouldReturn('301');
    }

    public function it_throws_an_exception_if_type_is_empty()
    {
        $this->shouldThrow('\InvalidArgumentException')->during('fromString', ['']);
    }

    public function it_throws_an_exception_if_type_is_null()
    {
        $this->shouldThrow('\InvalidArgumentException')->during('fromString', [null]);
    }

    public function it_throws_an_exception_if_type_is_not_in_defined_list()
    {
        $this->shouldThrow('\InvalidArgumentException')->during('fromString', ['other']);
    }
}
