<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210408\Symfony\Component\Cache\Traits;

use Typo3RectorPrefix20210408\Symfony\Component\Cache\PruneableInterface;
use Typo3RectorPrefix20210408\Symfony\Contracts\Service\ResetInterface;
/**
 * @author Nicolas Grekas <p@tchwork.com>
 *
 * @internal
 */
trait ProxyTrait
{
    private $pool;
    /**
     * {@inheritdoc}
     */
    public function prune()
    {
        return $this->pool instanceof \Typo3RectorPrefix20210408\Symfony\Component\Cache\PruneableInterface && $this->pool->prune();
    }
    /**
     * {@inheritdoc}
     */
    public function reset()
    {
        if ($this->pool instanceof \Typo3RectorPrefix20210408\Symfony\Contracts\Service\ResetInterface) {
            $this->pool->reset();
        }
    }
}
