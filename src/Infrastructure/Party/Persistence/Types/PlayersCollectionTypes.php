<?php

declare(strict_types=1);

namespace Skeleton\Dart\Infrastructure\Party\Persistence\Types;

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Skeleton\Dart\Domain\Party\Player;

/**
 * Custom type for players collection
 */
class PlayersCollectionTypes extends Type
{
    public const PLAYERS_COLLECTION_TYPE = 'players_collection';

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return $platform->getVarcharTypeDeclarationSQL($fieldDeclaration);
    }

    public function convertToPHPValue($nicknames, AbstractPlatform $platform): array
    {
        $players = [];
        foreach (explode(',', $nicknames) as $nickname) {
            $players[] = Player::fromString($nickname);
        }

        return $players;
    }

    public function convertToDatabaseValue($players, AbstractPlatform $platform): string
    {
        return implode(',', $players->__toArray());
    }

    public function getName()
    {
        return self::PLAYERS_COLLECTION_TYPE;
    }
}
