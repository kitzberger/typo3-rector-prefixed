<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210318\Symfony\Component\HttpKernel\EventListener;

use Typo3RectorPrefix20210318\Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Typo3RectorPrefix20210318\Symfony\Component\HttpFoundation\StreamedResponse;
use Typo3RectorPrefix20210318\Symfony\Component\HttpKernel\Event\ResponseEvent;
use Typo3RectorPrefix20210318\Symfony\Component\HttpKernel\KernelEvents;
/**
 * StreamedResponseListener is responsible for sending the Response
 * to the client.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @final
 */
class StreamedResponseListener implements \Typo3RectorPrefix20210318\Symfony\Component\EventDispatcher\EventSubscriberInterface
{
    /**
     * Filters the Response.
     */
    public function onKernelResponse(\Typo3RectorPrefix20210318\Symfony\Component\HttpKernel\Event\ResponseEvent $event)
    {
        if (!$event->isMasterRequest()) {
            return;
        }
        $response = $event->getResponse();
        if ($response instanceof \Typo3RectorPrefix20210318\Symfony\Component\HttpFoundation\StreamedResponse) {
            $response->send();
        }
    }
    public static function getSubscribedEvents() : array
    {
        return [\Typo3RectorPrefix20210318\Symfony\Component\HttpKernel\KernelEvents::RESPONSE => ['onKernelResponse', -1024]];
    }
}
