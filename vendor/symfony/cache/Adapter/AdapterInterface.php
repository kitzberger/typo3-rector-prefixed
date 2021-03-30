<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210330\Symfony\Component\Cache\Adapter;

use Typo3RectorPrefix20210330\Psr\Cache\CacheItemPoolInterface;
use Typo3RectorPrefix20210330\Symfony\Component\Cache\CacheItem;
// Help opcache.preload discover always-needed symbols
\class_exists(\Typo3RectorPrefix20210330\Symfony\Component\Cache\CacheItem::class);
/**
 * Interface for adapters managing instances of Symfony's CacheItem.
 *
 * @author Kévin Dunglas <dunglas@gmail.com>
 */
interface AdapterInterface extends \Typo3RectorPrefix20210330\Psr\Cache\CacheItemPoolInterface
{
    /**
     * {@inheritdoc}
     *
     * @return CacheItem
     */
    public function getItem($key);
    /**
     * {@inheritdoc}
     *
     * @return \Traversable|CacheItem[]
     */
    public function getItems(array $keys = []);
    /**
     * {@inheritdoc}
     *
     * @return bool
     */
    public function clear(string $prefix = '');
}
