<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Typo3RectorPrefix20210323\Symfony\Component\DependencyInjection\LazyProxy\Instantiator;

use Typo3RectorPrefix20210323\Symfony\Component\DependencyInjection\ContainerInterface;
use Typo3RectorPrefix20210323\Symfony\Component\DependencyInjection\Definition;
/**
 * {@inheritdoc}
 *
 * Noop proxy instantiator - produces the real service instead of a proxy instance.
 *
 * @author Marco Pivetta <ocramius@gmail.com>
 */
class RealServiceInstantiator implements \Typo3RectorPrefix20210323\Symfony\Component\DependencyInjection\LazyProxy\Instantiator\InstantiatorInterface
{
    /**
     * {@inheritdoc}
     */
    public function instantiateProxy(\Typo3RectorPrefix20210323\Symfony\Component\DependencyInjection\ContainerInterface $container, \Typo3RectorPrefix20210323\Symfony\Component\DependencyInjection\Definition $definition, string $id, callable $realInstantiator)
    {
        return $realInstantiator();
    }
}
