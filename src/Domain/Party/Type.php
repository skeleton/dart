<?php

declare(strict_types=1);

namespace Skeleton\Dart\Domain\Party;

use Webmozart\Assert\Assert;

class Type
{
    private const GAME_301 = '301';

    /** @var string */
    private $type;

    private function __construct(string $type)
    {
        Assert::stringNotEmpty($type, 'Type cannot be empty');
        Assert::oneOf($type, [self::GAME_301], sprintf('Type should be one of those value: %s', implode(', ', [self::GAME_301])));

        $this->type = $type;
    }

    public static function fromString(string $type): Type
    {
        return new self($type);
    }

    public function __toString(): string
    {
        return $this->type;
    }
}
