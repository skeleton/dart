<?php

declare(strict_types=1);

namespace Skeleton\Dart\Infrastructure\Party\Ui\NewParty;

use Skeleton\Dart\Application\Party\NewParty;
use Skeleton\Dart\Application\Party\NewPartyHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class NewPartyController
{
    /** @var NewPartyHandler */
    private $newPartyHandler;

    public function __construct(NewPartyHandler $newPartyHandler)
    {
        $this->newPartyHandler = $newPartyHandler;
    }

    public function index(Request $request): JsonResponse
    {
        $content = $request->request->all();
        $newParty = new NewParty($content['game'], explode(',', $content['users']));
        ($this->newPartyHandler)($newParty);

        return new JsonResponse();
    }
}
