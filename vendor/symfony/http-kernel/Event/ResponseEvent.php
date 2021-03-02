<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210302\Symfony\Component\HttpKernel\Event;

use Typo3RectorPrefix20210302\Symfony\Component\HttpFoundation\Request;
use Typo3RectorPrefix20210302\Symfony\Component\HttpFoundation\Response;
use Typo3RectorPrefix20210302\Symfony\Component\HttpKernel\HttpKernelInterface;
/**
 * Allows to filter a Response object.
 *
 * You can call getResponse() to retrieve the current response. With
 * setResponse() you can set a new response that will be returned to the
 * browser.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
final class ResponseEvent extends \Typo3RectorPrefix20210302\Symfony\Component\HttpKernel\Event\KernelEvent
{
    private $response;
    public function __construct(\Typo3RectorPrefix20210302\Symfony\Component\HttpKernel\HttpKernelInterface $kernel, \Typo3RectorPrefix20210302\Symfony\Component\HttpFoundation\Request $request, int $requestType, \Typo3RectorPrefix20210302\Symfony\Component\HttpFoundation\Response $response)
    {
        parent::__construct($kernel, $request, $requestType);
        $this->setResponse($response);
    }
    public function getResponse() : \Typo3RectorPrefix20210302\Symfony\Component\HttpFoundation\Response
    {
        return $this->response;
    }
    public function setResponse(\Typo3RectorPrefix20210302\Symfony\Component\HttpFoundation\Response $response) : void
    {
        $this->response = $response;
    }
}
