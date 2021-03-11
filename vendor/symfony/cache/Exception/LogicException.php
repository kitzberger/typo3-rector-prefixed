<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210311\Symfony\Component\Cache\Exception;

use Typo3RectorPrefix20210311\Psr\Cache\CacheException as Psr6CacheInterface;
use Typo3RectorPrefix20210311\Psr\SimpleCache\CacheException as SimpleCacheInterface;
if (\interface_exists(\Typo3RectorPrefix20210311\Psr\SimpleCache\CacheException::class)) {
    class LogicException extends \LogicException implements \Typo3RectorPrefix20210311\Psr\Cache\CacheException, \Typo3RectorPrefix20210311\Psr\SimpleCache\CacheException
    {
    }
} else {
    class LogicException extends \LogicException implements \Typo3RectorPrefix20210311\Psr\Cache\CacheException
    {
    }
}
