<?php

namespace Skeleton\Dart\Application\Player;

class CreatePlayer
{
    /** @var string|null */
    public $nickname;

    public function __construct(?string $nickname)
    {
        $this->nickname = $nickname;
    }
}
