<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210413\Symfony\Component\HttpKernel\EventListener;

use Typo3RectorPrefix20210413\Psr\Container\ContainerInterface;
use Typo3RectorPrefix20210413\Symfony\Component\HttpFoundation\Session\SessionInterface;
use Typo3RectorPrefix20210413\Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use Typo3RectorPrefix20210413\Symfony\Component\HttpKernel\Event\RequestEvent;
/**
 * Sets the session in the request.
 *
 * When the passed container contains a "session_storage" entry which
 * holds a NativeSessionStorage instance, the "cookie_secure" option
 * will be set to true whenever the current master request is secure.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @final
 */
class SessionListener extends \Typo3RectorPrefix20210413\Symfony\Component\HttpKernel\EventListener\AbstractSessionListener
{
    public function __construct(\Typo3RectorPrefix20210413\Psr\Container\ContainerInterface $container, bool $debug = \false)
    {
        parent::__construct($container, $debug);
    }
    public function onKernelRequest(\Typo3RectorPrefix20210413\Symfony\Component\HttpKernel\Event\RequestEvent $event)
    {
        parent::onKernelRequest($event);
        if (!$event->isMasterRequest() || !$this->container->has('session')) {
            return;
        }
        if ($this->container->has('session_storage') && ($storage = $this->container->get('session_storage')) instanceof \Typo3RectorPrefix20210413\Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage && ($masterRequest = $this->container->get('request_stack')->getMasterRequest()) && $masterRequest->isSecure()) {
            $storage->setOptions(['cookie_secure' => \true]);
        }
    }
    protected function getSession() : ?\Typo3RectorPrefix20210413\Symfony\Component\HttpFoundation\Session\SessionInterface
    {
        if (!$this->container->has('session')) {
            return null;
        }
        return $this->container->get('session');
    }
}
