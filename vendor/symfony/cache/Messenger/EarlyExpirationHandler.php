<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210302\Symfony\Component\Cache\Messenger;

use Typo3RectorPrefix20210302\Symfony\Component\Cache\CacheItem;
use Typo3RectorPrefix20210302\Symfony\Component\DependencyInjection\ReverseContainer;
use Typo3RectorPrefix20210302\Symfony\Component\Messenger\Handler\MessageHandlerInterface;
/**
 * Computes cached values sent to a message bus.
 */
class EarlyExpirationHandler implements \Typo3RectorPrefix20210302\Symfony\Component\Messenger\Handler\MessageHandlerInterface
{
    private $reverseContainer;
    private $processedNonces = [];
    public function __construct(\Typo3RectorPrefix20210302\Symfony\Component\DependencyInjection\ReverseContainer $reverseContainer)
    {
        $this->reverseContainer = $reverseContainer;
    }
    public function __invoke(\Typo3RectorPrefix20210302\Symfony\Component\Cache\Messenger\EarlyExpirationMessage $message)
    {
        $item = $message->getItem();
        $metadata = $item->getMetadata();
        $expiry = $metadata[\Typo3RectorPrefix20210302\Symfony\Component\Cache\CacheItem::METADATA_EXPIRY] ?? 0;
        $ctime = $metadata[\Typo3RectorPrefix20210302\Symfony\Component\Cache\CacheItem::METADATA_CTIME] ?? 0;
        if ($expiry && $ctime) {
            // skip duplicate or expired messages
            $processingNonce = [$expiry, $ctime];
            $pool = $message->getPool();
            $key = $item->getKey();
            if (($this->processedNonces[$pool][$key] ?? null) === $processingNonce) {
                return;
            }
            if (\microtime(\true) >= $expiry) {
                return;
            }
            $this->processedNonces[$pool] = [$key => $processingNonce] + ($this->processedNonces[$pool] ?? []);
            if (\count($this->processedNonces[$pool]) > 100) {
                \array_pop($this->processedNonces[$pool]);
            }
        }
        static $setMetadata;
        $setMetadata = $setMetadata ?? \Closure::bind(function (\Typo3RectorPrefix20210302\Symfony\Component\Cache\CacheItem $item, float $startTime) {
            if ($item->expiry > ($endTime = \microtime(\true))) {
                $item->newMetadata[\Typo3RectorPrefix20210302\Symfony\Component\Cache\CacheItem::METADATA_EXPIRY] = $item->expiry;
                $item->newMetadata[\Typo3RectorPrefix20210302\Symfony\Component\Cache\CacheItem::METADATA_CTIME] = (int) \ceil(1000 * ($endTime - $startTime));
            }
        }, null, \Typo3RectorPrefix20210302\Symfony\Component\Cache\CacheItem::class);
        $startTime = \microtime(\true);
        $pool = $message->findPool($this->reverseContainer);
        $callback = $message->findCallback($this->reverseContainer);
        $value = $callback($item);
        $setMetadata($item, $startTime);
        $pool->save($item->set($value));
    }
}
