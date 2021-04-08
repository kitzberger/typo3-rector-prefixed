<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210408\Symfony\Component\Cache\Exception;

use Typo3RectorPrefix20210408\Psr\Cache\InvalidArgumentException as Psr6CacheInterface;
use Typo3RectorPrefix20210408\Psr\SimpleCache\InvalidArgumentException as SimpleCacheInterface;
if (\interface_exists(\Typo3RectorPrefix20210408\Psr\SimpleCache\InvalidArgumentException::class)) {
    class InvalidArgumentException extends \InvalidArgumentException implements \Typo3RectorPrefix20210408\Psr\Cache\InvalidArgumentException, \Typo3RectorPrefix20210408\Psr\SimpleCache\InvalidArgumentException
    {
    }
} else {
    class InvalidArgumentException extends \InvalidArgumentException implements \Typo3RectorPrefix20210408\Psr\Cache\InvalidArgumentException
    {
    }
}
