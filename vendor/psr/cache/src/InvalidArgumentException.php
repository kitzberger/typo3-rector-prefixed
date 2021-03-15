<?php

namespace Typo3RectorPrefix20210315\Psr\Cache;

/**
 * Exception interface for invalid cache arguments.
 *
 * Any time an invalid argument is passed into a method it must throw an
 * exception class which implements Psr\Cache\InvalidArgumentException.
 */
interface InvalidArgumentException extends \Typo3RectorPrefix20210315\Psr\Cache\CacheException
{
}
