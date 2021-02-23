<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210223\Symfony\Component\Cache\Traits;

use Typo3RectorPrefix20210223\Psr\Log\LoggerInterface;
use Typo3RectorPrefix20210223\Symfony\Component\Cache\Adapter\AdapterInterface;
use Typo3RectorPrefix20210223\Symfony\Component\Cache\CacheItem;
use Typo3RectorPrefix20210223\Symfony\Component\Cache\Exception\InvalidArgumentException;
use Typo3RectorPrefix20210223\Symfony\Component\Cache\LockRegistry;
use Typo3RectorPrefix20210223\Symfony\Contracts\Cache\CacheInterface;
use Typo3RectorPrefix20210223\Symfony\Contracts\Cache\CacheTrait;
use Typo3RectorPrefix20210223\Symfony\Contracts\Cache\ItemInterface;
/**
 * @author Nicolas Grekas <p@tchwork.com>
 *
 * @internal
 */
trait ContractsTrait
{
    use CacheTrait {
        doGet as private contractsGet;
    }
    private $callbackWrapper = [\Typo3RectorPrefix20210223\Symfony\Component\Cache\LockRegistry::class, 'compute'];
    private $computing = [];
    /**
     * Wraps the callback passed to ->get() in a callable.
     *
     * @return callable the previous callback wrapper
     */
    public function setCallbackWrapper(?callable $callbackWrapper) : callable
    {
        $previousWrapper = $this->callbackWrapper;
        $this->callbackWrapper = $callbackWrapper ?? function (callable $callback, \Typo3RectorPrefix20210223\Symfony\Contracts\Cache\ItemInterface $item, bool &$save, \Typo3RectorPrefix20210223\Symfony\Contracts\Cache\CacheInterface $pool, \Closure $setMetadata, ?\Typo3RectorPrefix20210223\Psr\Log\LoggerInterface $logger) {
            return $callback($item, $save);
        };
        return $previousWrapper;
    }
    private function doGet(\Typo3RectorPrefix20210223\Symfony\Component\Cache\Adapter\AdapterInterface $pool, string $key, callable $callback, ?float $beta, array &$metadata = null)
    {
        if (0 > ($beta = $beta ?? 1.0)) {
            throw new \Typo3RectorPrefix20210223\Symfony\Component\Cache\Exception\InvalidArgumentException(\sprintf('Argument "$beta" provided to "%s::get()" must be a positive number, %f given.', static::class, $beta));
        }
        static $setMetadata;
        $setMetadata = $setMetadata ?? \Closure::bind(static function (\Typo3RectorPrefix20210223\Symfony\Component\Cache\CacheItem $item, float $startTime, ?array &$metadata) {
            if ($item->expiry > ($endTime = \microtime(\true))) {
                $item->newMetadata[\Typo3RectorPrefix20210223\Symfony\Component\Cache\CacheItem::METADATA_EXPIRY] = $metadata[\Typo3RectorPrefix20210223\Symfony\Component\Cache\CacheItem::METADATA_EXPIRY] = $item->expiry;
                $item->newMetadata[\Typo3RectorPrefix20210223\Symfony\Component\Cache\CacheItem::METADATA_CTIME] = $metadata[\Typo3RectorPrefix20210223\Symfony\Component\Cache\CacheItem::METADATA_CTIME] = (int) \ceil(1000 * ($endTime - $startTime));
            } else {
                unset($metadata[\Typo3RectorPrefix20210223\Symfony\Component\Cache\CacheItem::METADATA_EXPIRY], $metadata[\Typo3RectorPrefix20210223\Symfony\Component\Cache\CacheItem::METADATA_CTIME]);
            }
        }, null, \Typo3RectorPrefix20210223\Symfony\Component\Cache\CacheItem::class);
        return $this->contractsGet($pool, $key, function (\Typo3RectorPrefix20210223\Symfony\Component\Cache\CacheItem $item, bool &$save) use($pool, $callback, $setMetadata, &$metadata, $key) {
            // don't wrap nor save recursive calls
            if (isset($this->computing[$key])) {
                $value = $callback($item, $save);
                $save = \false;
                return $value;
            }
            $this->computing[$key] = $key;
            $startTime = \microtime(\true);
            try {
                $value = ($this->callbackWrapper)($callback, $item, $save, $pool, function (\Typo3RectorPrefix20210223\Symfony\Component\Cache\CacheItem $item) use($setMetadata, $startTime, &$metadata) {
                    $setMetadata($item, $startTime, $metadata);
                }, $this->logger ?? null);
                $setMetadata($item, $startTime, $metadata);
                return $value;
            } finally {
                unset($this->computing[$key]);
            }
        }, $beta, $metadata, $this->logger ?? null);
    }
}
