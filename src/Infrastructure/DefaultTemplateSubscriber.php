<?php

declare(strict_types=1);

namespace Skeleton\Dart\Infrastructure;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Return always the same index.html template
 */
class DefaultTemplateSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [KernelEvents::EXCEPTION => ['onKernelException', -63]];
    }

    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        ob_start();
        include __DIR__.'/../../public/templates/index.html';

        $event->setResponse(new Response(ob_get_clean(), Response::HTTP_OK));
        $event->allowCustomResponseCode();
    }
}
