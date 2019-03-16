<?php

declare(strict_types=1);

namespace Skeleton\Dart\Infrastructure\Party\Persistence;

use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;
use Skeleton\Dart\Domain\Party\Identifier;
use Skeleton\Dart\Domain\Party\Party;
use Skeleton\Dart\Domain\Party\PartyRepository;
use Skeleton\Dart\Infrastructure\Party\Persistence\Types\PlayersCollectionTypes;

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
REPLACE INTO party (identifier_identifier, type_field, players_collection) VALUES (:identifier, :type, :players)
SQL;

        $connection->executeUpdate(
            $sql,
            [
                'identifier' => $party->getIdentifier()->__toString(), \PDO::PARAM_STR,
                'type' => $party->getType()->__toString(), \PDO::PARAM_STR,
                'players' => $party->getPlayers(), \PDO::PARAM_STR,
            ],
            [
                'identifier' => \PDO::PARAM_STR,
                'type' => \PDO::PARAM_STR,
                'players' => PlayersCollectionTypes::PLAYERS_COLLECTION_TYPE,
            ]
        );
    }

    public function get(Identifier $identifier): ?Party
    {
        return $this->entityManager->find(Party::class, $identifier->__toString());
    }
}
