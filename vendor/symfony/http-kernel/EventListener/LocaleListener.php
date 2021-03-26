<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210326\Symfony\Component\HttpKernel\EventListener;

use Typo3RectorPrefix20210326\Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Typo3RectorPrefix20210326\Symfony\Component\HttpFoundation\Request;
use Typo3RectorPrefix20210326\Symfony\Component\HttpFoundation\RequestStack;
use Typo3RectorPrefix20210326\Symfony\Component\HttpKernel\Event\FinishRequestEvent;
use Typo3RectorPrefix20210326\Symfony\Component\HttpKernel\Event\KernelEvent;
use Typo3RectorPrefix20210326\Symfony\Component\HttpKernel\Event\RequestEvent;
use Typo3RectorPrefix20210326\Symfony\Component\HttpKernel\KernelEvents;
use Typo3RectorPrefix20210326\Symfony\Component\Routing\RequestContextAwareInterface;
/**
 * Initializes the locale based on the current request.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @final
 */
class LocaleListener implements \Typo3RectorPrefix20210326\Symfony\Component\EventDispatcher\EventSubscriberInterface
{
    private $router;
    private $defaultLocale;
    private $requestStack;
    public function __construct(\Typo3RectorPrefix20210326\Symfony\Component\HttpFoundation\RequestStack $requestStack, string $defaultLocale = 'en', \Typo3RectorPrefix20210326\Symfony\Component\Routing\RequestContextAwareInterface $router = null)
    {
        $this->defaultLocale = $defaultLocale;
        $this->requestStack = $requestStack;
        $this->router = $router;
    }
    public function setDefaultLocale(\Typo3RectorPrefix20210326\Symfony\Component\HttpKernel\Event\KernelEvent $event)
    {
        $event->getRequest()->setDefaultLocale($this->defaultLocale);
    }
    public function onKernelRequest(\Typo3RectorPrefix20210326\Symfony\Component\HttpKernel\Event\RequestEvent $event)
    {
        $request = $event->getRequest();
        $this->setLocale($request);
        $this->setRouterContext($request);
    }
    public function onKernelFinishRequest(\Typo3RectorPrefix20210326\Symfony\Component\HttpKernel\Event\FinishRequestEvent $event)
    {
        if (null !== ($parentRequest = $this->requestStack->getParentRequest())) {
            $this->setRouterContext($parentRequest);
        }
    }
    private function setLocale(\Typo3RectorPrefix20210326\Symfony\Component\HttpFoundation\Request $request)
    {
        if ($locale = $request->attributes->get('_locale')) {
            $request->setLocale($locale);
        }
    }
    private function setRouterContext(\Typo3RectorPrefix20210326\Symfony\Component\HttpFoundation\Request $request)
    {
        if (null !== $this->router) {
            $this->router->getContext()->setParameter('_locale', $request->getLocale());
        }
    }
    public static function getSubscribedEvents() : array
    {
        return [\Typo3RectorPrefix20210326\Symfony\Component\HttpKernel\KernelEvents::REQUEST => [
            ['setDefaultLocale', 100],
            // must be registered after the Router to have access to the _locale
            ['onKernelRequest', 16],
        ], \Typo3RectorPrefix20210326\Symfony\Component\HttpKernel\KernelEvents::FINISH_REQUEST => [['onKernelFinishRequest', 0]]];
    }
}
