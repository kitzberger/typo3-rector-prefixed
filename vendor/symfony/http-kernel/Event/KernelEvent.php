<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210223\Symfony\Component\HttpKernel\Event;

use Typo3RectorPrefix20210223\Symfony\Component\HttpFoundation\Request;
use Typo3RectorPrefix20210223\Symfony\Component\HttpKernel\HttpKernelInterface;
use Typo3RectorPrefix20210223\Symfony\Contracts\EventDispatcher\Event;
/**
 * Base class for events thrown in the HttpKernel component.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class KernelEvent extends \Typo3RectorPrefix20210223\Symfony\Contracts\EventDispatcher\Event
{
    private $kernel;
    private $request;
    private $requestType;
    /**
     * @param int $requestType The request type the kernel is currently processing; one of
     *                         HttpKernelInterface::MASTER_REQUEST or HttpKernelInterface::SUB_REQUEST
     */
    public function __construct(\Typo3RectorPrefix20210223\Symfony\Component\HttpKernel\HttpKernelInterface $kernel, \Typo3RectorPrefix20210223\Symfony\Component\HttpFoundation\Request $request, ?int $requestType)
    {
        $this->kernel = $kernel;
        $this->request = $request;
        $this->requestType = $requestType;
    }
    /**
     * Returns the kernel in which this event was thrown.
     *
     * @return HttpKernelInterface
     */
    public function getKernel()
    {
        return $this->kernel;
    }
    /**
     * Returns the request the kernel is currently processing.
     *
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }
    /**
     * Returns the request type the kernel is currently processing.
     *
     * @return int One of HttpKernelInterface::MASTER_REQUEST and
     *             HttpKernelInterface::SUB_REQUEST
     */
    public function getRequestType()
    {
        return $this->requestType;
    }
    /**
     * Checks if this is a master request.
     *
     * @return bool True if the request is a master request
     */
    public function isMasterRequest()
    {
        return \Typo3RectorPrefix20210223\Symfony\Component\HttpKernel\HttpKernelInterface::MASTER_REQUEST === $this->requestType;
    }
}
