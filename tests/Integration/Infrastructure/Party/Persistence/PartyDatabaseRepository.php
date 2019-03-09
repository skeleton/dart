<?php

declare(strict_types=1);

namespace Skeleton\Dart\Test\Integration\Infrastructure\Party\Persistence;

use PHPUnit\Framework\Assert;
use Ramsey\Uuid\Uuid;
use Skeleton\Dart\Domain\Party\Identifier;
use Skeleton\Dart\Test\Common\Party\PartyBuilder;
use Skeleton\Dart\Test\Integration\IntegrationCase;

class PartyDatabaseRepository extends IntegrationCase
{
    /** @test */
    public function saveANewParty()
    {
        $identifier = Uuid::uuid4()->toString();
        $party = (new PartyBuilder())
            ->withType('301')
            ->withIdentifier($identifier)
            ->build();
        $repository = $this->get('Skeleton\Dart\Infrastructure\Party\Persistence\PartyDatabaseRepository');
        $repository->save($party);

        $party = $repository->get(Identifier::fromString($identifier));
        Assert::assertSame($identifier, $party->getIdentifier()->__toString());
        Assert::assertSame('301', $party->getType()->__toString());
    }
}
