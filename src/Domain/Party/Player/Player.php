<?php

declare(strict_types=1);

namespace Skeleton\Dart\Domain\Party\Player;

class Player
{
    /** @var Nickname */
    private $nickname;

    private function __construct(Nickname $nickname)
    {
        $this->nickname = $nickname;
    }

    public static function create(Nickname $nickname)
    {
        return new self($nickname);
    }

    public function nickname(): Nickname
    {
        return $this->nickname;
    }
}
