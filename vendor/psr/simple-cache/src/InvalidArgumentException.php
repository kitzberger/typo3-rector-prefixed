<?php

namespace Typo3RectorPrefix20210402\Psr\SimpleCache;

/**
 * Exception interface for invalid cache arguments.
 *
 * When an invalid argument is passed it must throw an exception which implements
 * this interface
 */
interface InvalidArgumentException extends \Typo3RectorPrefix20210402\Psr\SimpleCache\CacheException
{
}
