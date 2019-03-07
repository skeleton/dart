<?php

namespace specification\Skeleton\Dart\Application\Party;

use Skeleton\Dart\Application\Party\NewParty;
use Skeleton\Dart\Application\Party\NewPartyHandler;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NewPartyHandlerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(NewPartyHandler::class);
    }

    function it_handles_a_new_party()
    {
        $newParty = new NewParty('301', ['skeleton', 'krevindiou']);

        $this->__invoke($newParty)->shouldReturn(null);
    }
}
