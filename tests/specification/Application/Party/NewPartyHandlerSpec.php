<?php

namespace specification\Skeleton\Dart\Application\Party;

use Skeleton\Dart\Application\Party\NewParty;
use Skeleton\Dart\Application\Party\NewPartyHandler;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Skeleton\Dart\Domain\Party\Party;
use Skeleton\Dart\Domain\Party\PartyRepository;

class NewPartyHandlerSpec extends ObjectBehavior
{
    function let(PartyRepository $partyRepository)
    {
        $this->beConstructedWith($partyRepository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(NewPartyHandler::class);
    }

    function it_handles_a_new_party($partyRepository)
    {
        $newParty = new NewParty('301', ['skeleton', 'krevindiou']);
        $partyRepository->save(Argument::type(Party::class))->shouldBeCalled();

        $this->__invoke($newParty)->shouldReturn(null);
    }
}
