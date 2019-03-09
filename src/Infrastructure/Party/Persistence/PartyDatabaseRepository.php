<?php

declare(strict_types=1);

namespace Skeleton\Dart\Infrastructure\Party\Persistence;

use Doctrine\ORM\EntityManagerInterface;
use Skeleton\Dart\Domain\Party\Identifier;
use Skeleton\Dart\Domain\Party\Party;
use Skeleton\Dart\Domain\Party\PartyRepository;

/**
 * Database repository for "party"
 */
class PartyDatabaseRepository implements PartyRepository
{
    /** @var EntityManagerInterface */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(Party $party): void
    {
        $connection = $this->entityManager->getConnection();
        $sql = <<<SQL
REPLACE INTO party (identifier_identifier, type_field) VALUES (:identifier, :type)
SQL;

        $stmt = $connection->prepare($sql);
        $stmt->bindValue('identifier', $party->getIdentifier()->__toString(), \PDO::PARAM_STR);
        $stmt->bindValue('type', $party->getType()->__toString(), \PDO::PARAM_STR);
        $stmt->execute();
    }

    public function get(Identifier $identifier): ?Party
    {
        return $this->entityManager->find(Party::class, $identifier->__toString());
    }
}
