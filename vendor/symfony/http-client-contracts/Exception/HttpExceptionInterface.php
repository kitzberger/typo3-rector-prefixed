<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210223\Symfony\Contracts\HttpClient\Exception;

use Typo3RectorPrefix20210223\Symfony\Contracts\HttpClient\ResponseInterface;
/**
 * Base interface for HTTP-related exceptions.
 *
 * @author Anton Chernikov <anton_ch1989@mail.ru>
 */
interface HttpExceptionInterface extends \Typo3RectorPrefix20210223\Symfony\Contracts\HttpClient\Exception\ExceptionInterface
{
    public function getResponse() : \Typo3RectorPrefix20210223\Symfony\Contracts\HttpClient\ResponseInterface;
}