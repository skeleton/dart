<?php

namespace Skeleton\Dart\Domain\Player;

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

    public function nickname(): string
    {
        return $this->nickname;
    }
}
