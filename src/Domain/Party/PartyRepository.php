<?php

declare(strict_types=1);

namespace Skeleton\Dart\Domain\Party;

/**
 * Interface for "party" repository
 */
interface PartyRepository
{
    public function save(Party $party): void;

    public function get(Identifier $identifier): ?Party;
}
